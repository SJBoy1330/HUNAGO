<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_ctl extends MY_Admin {

    protected $mydata;

    var $data_path = "";

    function __construct(){
        parent::__construct();

        if (!$this->oitocauth->is_loggedin()){
            redirect(site_url('auth'));
        }

        $this->load->model('user_m');
        $this->data_path = $this->config->item('data_path');
    }

    public function index(){

        $this->data['pagetitle'] = "User"; 
        $mydata['data_path'] = $this->data_path;

        $mydata['parent'] = 'User'; 
        $mydata['arrchild'][] = array('link' => site_url('dashboard'), 'name' => 'Dashboard');
        $mydata['arrchild'][] = array('link' => '#', 'name' => 'User');

        $this->data['css_add'][] = '<link href="'.base_url('assets/dist/assets/plugins/custom/datatables/datatables.bundle.css').'" rel="stylesheet" type="text/css" />';

        $this->data['js_add'][] = '<script src="'.base_url('assets/dist/assets/plugins/custom/datatables/datatables.bundle.js').'"></script>';

        $this->data['js_add'][] = '<script type="text/javascript" src="'.base_url('assets/js/page/user/user.js').'"></script>';

        $result = $this->user_m->get_user(null, 0, 0);

        $mydata['result'] = $result;

        $this->data['content']=$this->load->view('index',$mydata,true);

        $this->display();
    }

    public function add(){

        $this->data['pagetitle'] = 'Tambah User';

        $mydata['parent'] = 'Tambah User';
        $mydata['arrchild'][] = array('link' => site_url('dashboard'), 'name' => 'Dashboard');
        $mydata['arrchild'][] = array('link' => site_url('user'), 'name' => 'User');
        $mydata['arrchild'][] = array('link' => '#', 'name' => 'Tambah User');


        $this->data['js_add'][] = '<script type="text/javascript" src="'.base_url('assets/js/page/user/adduser.js').'"></script>';

        $mydata['arrtipe'] = array(1 => 'superadmin', 2 => 'operator');

        $this->data['content'] = $this->load->view('add', $mydata, true);
        $this->display();

    }

    public function edit(){

        $id_user = $this->uri->segment(3);
        
        $mydata['data_path'] = $this->data_path;

        $this->data['pagetitle'] = 'Edit User';

        $mydata['parent'] = 'Tambah User';
        $mydata['arrchild'][] = array('link' => site_url('dashboard'), 'name' => 'Dashboard');
        $mydata['arrchild'][] = array('link' => site_url('user'), 'name' => 'User');
        $mydata['arrchild'][] = array('link' => '#', 'name' => 'Edit User');

        $this->data['js_add'][] = '<script type="text/javascript" src="'.base_url('assets/js/page/user/edituser.js').'"></script>';

        $mydata['arrtipe'] = array(1 => 'superadmin', 2 => 'operator');

        $result = $this->user_m->get_single_user(array('id_user' => $id_user));

        $mydata['result'] = $result;

        $this->data['content'] = $this->load->view('edit', $mydata, true);
        $this->display();


    }

    public function detail(){

        $id_user = $this->input->post('id_user');

        $result = $this->user_m->get_single_user(array('id_user' => $id_user));

        $data['result'] = $result;

        $this->load->view('detail', $data);
    }

    public function add_user(){

        header("Content-Type: text/json");

        $arrVar = array('username', 'nama', 'alamat', 'email', 'telp', 'tipe','foto', 'tipe', 'aktif', 'password', 'repassword');

        foreach($arrVar as $var){
            $$var = $this->input->post($var);
        }

        $this->form_validation->set_rules('username', 'Username', 'required|alpha_dash', array('required' => 'Username harus diisi', 'alpha_dash' => 'Username harus terdiri dari huruf, angka atau underscore'));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => 'Email harus diisi', 'valid_email' => 'Email harus dengan format yang valid'));
        $this->form_validation->set_rules('telp', 'Telp', 'required', array('required' => 'Telp harus diisi'));

        if ($this->form_validation->run() === FALSE){
            $response['status'] = 'NOK';
            $response['message'] = validation_errors();
            echo json_encode($response);
            exit;
        }

        if (!$this->_check_user('username', $username)){
            $response['status'] = 'NOK';
            $response['message'] = 'Username sudah terdaftar';
            echo json_encode($response);
            exit;
        }

        if (!$this->_check_user('email', $email)){
            $response['status'] = 'NOK';
            $response['message'] = 'Email sudah terdaftar';
            echo json_encode($response);
            exit;   
        }


        if (!$this->_check_user('telp', $email)){
            $response['status'] = 'NOK';
            $response['message'] = 'Telp sudah terdaftar';
            echo json_encode($response);
            exit;   
        }

        if ($password != $repassword){
            $response['status'] = 'NOK';
            $response['message'] = 'Password Tidak Sama';
            echo json_encode($response);
            exit;
        }

        if ($password == ""){
            $response['status'] = 'NOK';
            $response['message'] = 'Password Harus Diisi';
            echo json_encode($response);
            exit;   
        }

        $password = hash('sha256', $username.$password);


        $arrInsert = array('username' => $username, 'nama' => $nama, 'alamat' => $alamat, 'email' => $email, 'telp' => $telp, 'tipe' => $tipe, 'aktif' => $aktif, 'password' => $password);

         if (!empty($_FILES['foto']['tmp_name'])){

            $config['upload_path'] = $this->data_path.'user/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $config['file_name'] = uniqid();
            $config['file_ext_tolower'] = true;

            $this->load->library('upload', $config);

            $data = [];

            if (! $this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
                $response['status'] = 'NOK';
                $response['message'] = 'Gagal mengupload file: '.$error['error'];
                echo json_encode($response);
                exit;
            }else{

                $data = array('upload_data' => $this->upload->data());

            }

            $foto = $data['upload_data']['file_name'];
            $arrInsert['foto'] = $foto;

        }else{
            $foto = '';
        }


        $res = $this->user_m->insert_user($arrInsert);
        if ($res){
            $response['status'] = 'OK';
            $response['message'] = 'Berhasil menambahkan User '.$username;
        }else{
            $response['status'] = 'NOK';
            $response['message'] = 'Gagal menambahkan User';
        }

        echo json_encode($response);
        exit;

    }


    public function edit_user(){


        header("Content-Type: text/json");

        $arrVar = array('id_user', 'username', 'nama', 'alamat', 'email', 'telp',  'foto', 'tipe', 'aktif', 'password', 'repassword');
        foreach($arrVar as $var){
            $$var = $this->input->post($var);
        }

        $this->form_validation->set_rules('username', 'Username', 'required|alpha_dash', array('required' => 'Username harus diisi', 'alpha_dash' => 'Username harus terdiri dari huruf, angka atau underscore'));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => 'Email harus diisi', 'valid_email' => 'Email harus dengan format yang valid'));
        $this->form_validation->set_rules('telp', 'Telp', 'required', array('required' => 'Telp harus diisi'));
        
        if ($this->form_validation->run() === FALSE){
            $response['status'] = 'NOK';
            $response['message'] = validation_errors();
            echo json_encode($response);
            exit;
        }

        if (!$this->_check_user('username', $username, $id_user)){
            $response['status'] = 'NOK';
            $response['message'] = 'Username sudah terdaftar ';
            echo json_encode($response);
            exit;
        }

        if (!$this->_check_user('email', $email, $id_user)){
            $response['status'] = 'NOK';
            $response['message'] = 'Email sudah terdaftar';
            echo json_encode($response);
            exit;   
        }


        if (!$this->_check_user('telp', $email, $id_user)){
            $response['status'] = 'NOK';
            $response['message'] = 'Telp sudah terdaftar';
            echo json_encode($response);
            exit;   
        }

        $arrUpdate = array('username' => $username, 'nama' => $nama, 'alamat' => $alamat, 'email' => $email, 'telp' => $telp, 'tipe' => $tipe, 'aktif' => $aktif);


        if ($password != ""){
            if ($password == $repassword){
                $arrUpdate['password'] = hash('sha256', $username.$password);
            }
        }


         if (!empty($_FILES['foto']['tmp_name'])){

            $config['upload_path'] = $this->data_path.'user/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $config['file_name'] = uniqid();
            $config['file_ext_tolower'] = true;

            $this->load->library('upload', $config);

            $data = [];

            if (! $this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
                $response['status'] = 'NOK';
                $response['message'] = 'Gagal mengupload file: '.$error['error'];
                echo json_encode($response);
                exit;
            }else{

                $data = array('upload_data' => $this->upload->data());

                

                $resprofile = $this->user_m->get_single_user(array('id_user' => $id_user));
                $fotonow = $resprofile->foto;
                $thumbfotonow = $resporfile->thumb;

                if ($fotonow != "" && file_exists($this->data_path.'user/'.$fotonow)){
                    unlink($this->data_path.'user/'.$fotonow); 
                }

            }

            $foto = $data['upload_data']['file_name'];
            $arrUpdate['foto'] = $foto;

        }else{
            $foto = '';
        }


        $res = $this->user_m->update_user($arrUpdate, $id_user);
        if ($res){
            $response['status'] = 'OK';
            $response['message'] = 'Berhasil mengubah User '.$username;
        }else{
            $response['status'] = 'NOK';
            $response['message'] = 'Gagal mengubah User';
        }

        echo json_encode($response);
        exit;


    }


    function _check_user($kolom, $value, $knownid=''){

        /*** true artinya bisa nambahin email / telepon, false artinya tidak bisa. ***/

        $resuser = $this->user_m->get_single_user(array($kolom => $value));
        if (!$resuser){
            return true;
        }else{

            if ($knownid != $resuser->id_user){
                return false;
            }else{
                return true;
            }
        }
    }


    public function delete(){

        $id_user = $this->input->post('id_user');

        $resuser = $this->user_m->get_single_user(array('id_user' => $id_user));

        if (!$resuser){
            show_404();
        }

        if ($this->user_m->delete($id_user)){
            $response['status'] = 'OK';
            $response['message'] = 'Berhasil menghapus User '.$resuser->username;
        }else{
            $response['status'] = 'OK';
            $response['message'] = 'Gagal menghapus User';
        }

        header("Content-Type: text/json");
        echo json_encode($response);
        exit;

    }


}