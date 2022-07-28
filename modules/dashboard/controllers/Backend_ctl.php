<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_ctl extends MY_Admin {

    function __construct(){
        parent::__construct();
        
        if (!$this->oitocauth->is_loggedin()){
            redirect(site_url('auth/login_ctl'));
        }
    }

    public function index(){

        $this->data['pagetitle'] = "Dashboard"; 

        $mydata['parent'] = 'Dashboard';


        $mydata['result'] = '';

        $this->data['content']=$this->load->view('index',$mydata,true);

        $this->display();

    }

}