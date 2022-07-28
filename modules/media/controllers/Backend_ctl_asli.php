<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_ctl extends MY_Admin {

    var $data_path = '';

    function __construct(){
        parent::__construct();

        $this->data_path = $this->config->item('data_path');    
    }

    public function index(){

        $this->data['pagetitle'] = "Dashboard"; 

        $mydata['parent'] = 'Dashboard';
        $mydata['result'] = '';

        $this->data['content']=$this->load->view('index',$mydata,true);

        $this->display();

    }

    public function image_access_splash($encfile){

        $pathfilename = base64_decode($encfile);
        $tmp = explode("splash/", $pathfilename);
        $path = $tmp[0].'/splash/';
        $ext = pathinfo($pathfilename, PATHINFO_EXTENSION);
        
        $filename = $tmp[1];

        image_access_svg($path, $filename);
    }

    public function image_access_profile($encfile){

        $pathfilename = base64_decode($encfile);
        $tmp = explode("user/", $pathfilename);
        $path = $tmp[0].'/user/';
        $filename = $tmp[1];

        image_access($path, $filename);
    }

    public function image_access_user_thumb($encfile){

        /**** khusus ini path thumb sama gambar dijadikan basecode64 */

        $pathfilename = base64_decode($encfile);
        $tmp = explode("thumb/", $pathfilename);
        $path = $tmp[0].'/thumb/';
        $filename = $tmp[1];

        image_access($path, $filename);

    }

    public function image_access_staf($encfile){

        /**** khusus ini path thumb sama gambar dijadikan basecode64 */

        $pathfilename = base64_decode($encfile);
        $tmp = explode("staf/", $pathfilename);
        $path = $tmp[0].'/staf/';
        $filename = $tmp[1];

        image_access($path, $filename);

    }

    public function image_access_staf_thumb($encfile){

        /**** khusus ini path thumb sama gambar dijadikan basecode64 */

        $pathfilename = base64_decode($encfile);
        $tmp = explode("thumb/", $pathfilename);
        $path = $tmp[0].'/thumb/';
        $filename = $tmp[1];

        image_access($path, $filename);

    }

    public function image_access_bantuan($encfile){
        $path = $this->data_path.'bantuan/';

        $filename = base64_decode($encfile);

        image_access($path, $filename);
    }

    public function image_access_setting($encfile){

        $pathfilename = base64_decode($encfile);
        $tmp = explode("setting/", $pathfilename);
        $path = $tmp[0].'/setting/';
        $filename = $tmp[1];

        image_access($path, $filename);
    }

}