<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_ctl extends MY_Admin {

    function __construct(){
        parent::__construct();
   
    }

    public function index(){

        $this->data['pagetitle'] = "Video"; 

        $mydata['parent'] = 'Video';


        $mydata['result'] = '';

        $this->data['content']=$this->load->view('index',$mydata,true);

        $this->display();

    }

    public function single(){
        
        $this->data['pagetitle'] = "Single Video"; 

        $mydata['parent'] = 'Single Video';


        $mydata['result'] = '';

        $this->data['content']=$this->load->view('single',$mydata,true);

        $this->display();
    }

    public function koleksi(){
        
        $this->data['pagetitle'] = "Koleksi Video"; 

        $mydata['parent'] = 'Koleksi Video';


        $mydata['result'] = '';

        $this->data['content']=$this->load->view('koleksi',$mydata,true);

        $this->display();
    }

    public function upload(){
        $this->data['pagetitle'] = "Upload Video"; 

        $mydata['parent'] = 'Upload Video';


        $mydata['result'] = '';

        $this->data['content']=$this->load->view('upload',$mydata,true);

        $this->display();       
    }
}