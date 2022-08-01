<?php defined('BASEPATH') or exit('No direct script access allowed');

class Backend_ctl extends MY_Mimin
{
    protected $id_user = '';
    protected $role = '';
    var $data_path = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->data_path = $this->config->item('data_path');

        // LOAD SESSION
        $this->id_user = $this->session->userdata('hunago_id_user');
        $this->role = $this->session->userdata('hunago_role');
    }

    function index()
    {

        $this->data['pagetitle'] = "Profil";

        $mydata['parent'] = 'Profil';
        $mydata['arrchild'][] = array('link' => site_url('dashboard'), 'name' => 'Dashboard');
        $mydata['arrchild'][] = array('link' => '#', 'name' => 'Profil');

        $this->data['js_add'][] = '<script type="text/javascript" src="' . base_url('assets/js/page/profile/profile.js') . '"></script>';

        $result = $this->oitoclib->get_user();
        $mydata['result'] = $result;

        $mydata['data_path'] = $this->data_path;

        $this->data['content'] = $this->load->view('index', $mydata, true);

        $this->display();
    }

    function update()
    {

        $this->data['pagetitle'] = "Profil";

        $mydata['parent'] = 'Profil';
        $mydata['arrchild'][] = array('link' => site_url('dashboard'), 'name' => 'Dashboard');
        $mydata['arrchild'][] = array('link' => '#', 'name' => 'Profil');

        $this->data['js_add'][] = '<script type="text/javascript" src="' . base_url('assets/js/page/profile/profile.js') . '"></script>';

        $result = $this->oitoclib->get_user();


        $mydata['result'] = $result;

        $this->data['content'] = $this->load->view('edit', $mydata, true);

        $this->display();
    }


    function ubah_password()
    {

        $this->data['pagetitle'] = "Ubah Kata Sandi";

        $mydata['parent'] = 'Ubah Kata Sandi';
        $mydata['arrchild'][] = array('link' => site_url('dashboard'), 'name' => 'Dashboard');
        $mydata['arrchild'][] = array('link' => "#", 'name' => 'Ubah Kata Sandi');

        $this->data['js_add'][] = '<script type="text/javascript" src="' . base_url('assets/js/page/profile/profile.js') . '"></script>';

        $result = $this->oitoclib->get_user();

        $mydata['result'] = $result;

        $this->data['content'] = $this->load->view('ubah_password', $mydata, true);

        $this->display();
    }

    function save()
    {

        header("Content-type: text/json");
        $response = [];

        $id_user = $this->session->userdata('instastudio_id_user');

        $arrVar = array('username', 'nama', 'alamat', 'telp', 'email');
        foreach ($arrVar as $var) {
            $$var = $this->input->post($var);
        }

        $this->form_validation->set_rules('username', 'Username', 'required|alpha_dash', array('required' => 'Username harus diisi', 'alpha_dash' => 'Format harus huruf, angka dan dash'));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('telp', 'Telp', 'required', array('required' => "Telepon harus diisi"));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => "Email harus diisi", 'valid_email' => 'Format email harus valid'));

        if ($this->form_validation->run() === FALSE) {
            $response['status'] = 'NOK';
            $response['message'] = validation_errors();
            echo json_encode($response);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['status'] = 'NOK';
            $response['message'] = "Email harus valid";
            echo json_encode($response);
            exit;
        }


        if (!empty($_FILES['foto']['tmp_name'])) {

            $config['upload_path'] = $this->data_path . 'user/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $config['file_name'] = uniqid();
            $config['file_ext_tolower'] = true;

            $this->load->library('upload', $config);

            $data = [];

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $response['status'] = 'NOK';
                $response['message'] = 'Gagal mengupload file: ' . $error['error'];
                echo json_encode($response);
                exit;
            } else {

                $data = array('upload_data' => $this->upload->data());



                $resprofile = $this->user_m->get_single_user(array('id_user' => $id_user));
                $fotonow = $resprofile->foto;
                $thumbfotonow = $resporfile->thumb;

                if ($fotonow != "" && file_exists($this->data_path . 'user/' . $fotonow)) {
                    unlink($this->data_path . 'user/' . $fotonow);
                }
            }

            $foto = $data['upload_data']['file_name'];
            $arrUpdate['foto'] = $foto;
        } else {
            $foto = '';
        }

        $arrUpdate['nama'] = $nama;
        $arrUpdate['alamat'] = $alamat;
        $arrUpdate['telp'] = $telp;
        $arrUpdate['email'] = $email;


        $res = $this->user_m->update_user($arrUpdate, $id_user);

        if ($res) {
            $response['status'] = 'OK';
            $response['message'] = "Berhasil menyimpan Profile "; //.$this->db->last_query();
        } else {
            $response['status'] = 'NOK';
            $response['message'] = "Gagal Menyimpan Profile";
        }

        echo json_encode($response);
        exit;
    }



    function save_password()
    {

        header("Content-type: text/json");

        $oldpassword = $this->input->post('oldpassword');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        if ($password == '') {
            $response['status'] = 'NOK';
            $response['message'] = 'Gagal Menyimpan. Password Tidak boleh kosong';
        } else if ($password != $repassword) {
            $response['status'] = 'NOK';
            $response['message'] = 'Isian Password harus sama';
        } else if (strlen($password) < 5) {
            $response['status'] = 'NOK';
            $response['message'] = 'Panjang karakter password harus lebih dari atau sama dengan 5 karakter';
        } else if ($password == $repassword) {

            /*** cek dulu password lama apakah benar atau tidak ***/


            $id_user = $this->session->userdata('instastudio_id_user');
            $username = $this->session->userdata('instastudio_username');
            $passwordlama = hash('sha256', $username . $oldpassword);

            $rescheck = $this->user_m->get_single_user(array('username' => $username, 'password' => $passwordlama));

            if (!$rescheck) {
                $response['status'] = 'NOK';
                $response['message'] = 'Kata Sandi lama salah ';

                echo json_encode($response);
                exit;
            }


            $password = hash('sha256', $username . $password);

            $arrUpdate = array('password' => $password);
            $res = $this->user_m->update_user($arrUpdate, $id_user);

            if ($res) {
                $response['status'] = 'OK';
                $response['message'] = "Berhasil mengubah Password";
            } else {
                $response['status'] = 'NOK';
                $response['message'] = 'Gagal Mengubah Password';
            }
        }

        echo json_encode($response);
        exit;
    }

    public function resizeImage($filename)
    {

        $sourcepath = APPPATH . '../../data/user/' . $filename;
        $target_path = APPPATH . '../../data/user/thumb/';
        $configthumb = array(
            'image_library' => 'gd2',
            'source_image' => $sourcepath,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '_thumb',
            'width' => 150,
            'height' => 150
        );

        $message = '';

        $this->load->library('image_lib');
        $this->image_lib->initialize($configthumb);
        if (!$this->image_lib->resize()) {
            //$message = $this->image_lib->display_errors();
            $message = "Gagal Membuat Thumbnail";
        }

        $this->image_lib->clear();

        return $message;
    }
}
