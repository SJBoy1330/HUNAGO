<?php 

class Oitocauth {

    var $CI;

    public function __construct()
	{
        $this->CI = & get_instance();
        $this->CI->load->model('signin_m');
    
    }

    public function is_loggedin(){
    
        if ($this->CI->session->userdata('instastudio_username')){
            //redirect(site_url('dashboard'));
            return true;
        }else{
            return false;
        }
        //print_r($this->CI->session);
    }

    public function signin($username, $password){

        $is_correct = $this->CI->signin_m->signin($username, $password);

        if ($is_correct){
            redirect(site_url('dashboard'));
        }else{
            $this->CI->session->set_flashdata('msg', 'Username And Password not correct!');
            $this->CI->session->set_flashdata('alertype', 'danger');
            redirect(site_url('auth'));
        }
    }
}