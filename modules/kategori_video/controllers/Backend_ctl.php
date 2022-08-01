<?php defined('BASEPATH') or exit('No direct script access allowed');

class Backend_ctl extends MY_Mimin
{

    protected $id_user = '';
    protected $role = '';
    function __construct()
    {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('video_kategori_m');

        // LOAD SESSION
        $this->id_user = $this->session->userdata('hunago_id_user');
        $this->role = $this->session->userdata('hunago_role');
    }

    public function index()
    {

        $this->data['pagetitle'] = "Kategori video";

        $mydata['parent'] = 'Kategori Video';
        // LOAD DATA 
        $kategori = $this->video_kategori_m->get_all();

        $mydata['result'] = $kategori;

        $this->data['content'] = $this->load->view('index', $mydata, true);

        $this->display();
    }
}
