<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_ctl extends MY_Admin {

    var $id_sekolah = '';
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

    public function download(){

        $thefile = $this->input->get('id');

        if ($thefile != ""){
            
            $thefile = base64_decode(base64_decode($thefile));
            
            list($path, $file) = explode("-", $thefile);
            // $path = base64_decode($path);
            // $file = base64_decode($file);
            $filename = $path.$file;
            //echo $filename;die;
        }else{
            header( 'HTTP/1.1 404 Not Found' );
    
            echo "<h1>File not found</h1>";
            exit;
        }


        if( file_exists( $filename ) ) {

            /** 
             * Send some headers indicating the filetype, and it's size. This works for PHP >= 5.3.
             * If you're using PHP < 5.3, you might want to consider installing the Fileinfo PECL
             * extension.
             */
            $finfo = finfo_open( FILEINFO_MIME );
            header( 'Content-Disposition: attachment; filename= ' . basename( $filename ) );
            header('Content-Type: ' . finfo_file( $finfo, $filename ));
            header( 'Content-Length: ' . filesize( $filename ) );
            header( 'Expires: 0' );
            finfo_close( $finfo );
    
            /**
             * Now clear the buffer, read the file and output it to the browser.
             */
            ob_clean( );
            flush( );
            readfile( $filename );
            exit;
        }
    
        header( 'HTTP/1.1 404 Not Found' );
    
        echo "<h1>File not found</h1>";
        exit;
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

    public function image_access_setting($encfile){

        $pathfilename = base64_decode($encfile);
        $tmp = explode("setting/", $pathfilename);
        $path = $tmp[0].'/setting/';
        $filename = $tmp[1];

        image_access($path, $filename);
    }
    
    public function image_access_user($encfile){

        /**** khusus ini path thumb sama gambar dijadikan basecode64 */

        $pathfilename = base64_decode($encfile);
        $tmp = explode("user/", $pathfilename);
        $path = $tmp[0].'/user/';
        $filename = $tmp[1];

        image_access($path, $filename);

    }

    public function image_access_bantuan($encfile){
        
        $path = $this->data_path.'bantuan/';

        $filename = base64_decode($encfile);

        image_access($path, $filename);
    }
    
    public function image_access_blog($encfile){
        
        $path = $this->data_path.'blog/';

        $filename = base64_decode($encfile);

        image_access($path, $filename);
    }
    
    public function image_access_project($encfile){
        
        $path = $this->data_path.'project/';
        $filename = base64_decode($encfile);
       
        image_access($path, $filename);
    }

    public function image_access_gallery_project($encfile){
        $path = $this->data_path.'project/';
        $filename = base64_decode($encfile);
       
        image_access($path, $filename);
    }
    
    public function image_access_kategori_project($encfile){
        
        $path = $this->data_path.'kategori_project/';
        $filename = base64_decode($encfile);
       
        image_access($path, $filename);
    }
    
    public function image_access_slideshow($encfile){
        
        $path = $this->data_path.'slideshow/';
        $filename = base64_decode($encfile);
       
        image_access($path, $filename);
    }

    public function no_image(){

        $path = $this->data_path.'default/';
        $filename = 'no-image.jpg';
 
        image_access($path, $filename);
    }


}