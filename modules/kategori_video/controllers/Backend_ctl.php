<?php defined('BASEPATH') or exit('No direct script access allowed');

class Backend_ctl extends MY_Mimin
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->data['pagetitle'] = "Kategori video";

        $mydata['parent'] = 'Kategori Video';


        $mydata['result'] = '';

        $this->data['content'] = $this->load->view('index', $mydata, true);

        $this->display();
    }
}
