<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctl extends MY_Admin {

    var $is_login = false;

    function __construct(){
        parent::__construct();
        $this->load->model('user_m');
    }

    function index(){

        if ($this->oitocauth->is_loggedin()){
            redirect(site_url('dashboard'));
        }

        //echo password_hash('12345', PASSWORD_DEFAULT);
        //echo hash('sha256', 'admin'.'12345');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($_POST){

            if ($this->form_validation->run() === FALSE){
                $this->session->set_flashdata('msg', validation_errors()); 
                $this->session->set_flashdata('alertype', 'danger');
                redirect(site_url('auth'), 'refresh');
            }else{



               $this->oitocauth->signin($username, $password); 

            }
        }
        
		$this->display('auth');
    }

    function logout(){
        $this->session->unset_userdata('instastudio_id_user');
        $this->session->unset_userdata('instastudio_username');
        $this->session->unset_userdata('instastudio_tipe');
        redirect(site_url('auth'), 'refresh');
    }

    public function set_signin(){

        $arrResult = [];


        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $password = hash('sha256', $username.$password);
        $arr = array('username' => $username, 'password' => $password, 'aktif' => 'Y' );

        $result = $this->user_m->get_single_user($arr);

        if (!$result){
            $arrResult['message'] = 'NOK';
        }else{
            $arruser['instastudio_id_user'] = $result->id_user;
            $arruser['instastudio_username'] = $result->username;
            $arruser['instastudio_tipe'] = $result->tipe;
            $this->session->set_userdata($arruser);

            $this->user_m->update_user(array('last_access' => date('Y-m-d H:i:s')), $result->id_user);
            //*** set last access ***/
            $arrResult['message'] = 'OK';
        }

        header("Content-type: text/json");
        echo json_encode($arrResult);
        exit;
    }
}