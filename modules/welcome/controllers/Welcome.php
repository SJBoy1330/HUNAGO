<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Admin {

    function __cosntruct(){
        parent::__construct();
    

    }

    public function index(){

        $this->data['pagetitle'] = "Welcome"; 

        $this->data['breadcrumb'] = '<li class="breadcrumb-item"><a href="#">Dashboard</a></li>';

        $mydata['result'] = '';

        $this->data['content']=$this->load->view('index',$mydata,true);

        $this->display();

    }

}