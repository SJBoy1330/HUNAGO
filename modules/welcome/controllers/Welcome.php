<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Admin
{

    function __construct()
    {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('video_m');
        $this->load->model('video_kategori_m');
    }

    public function index()
    {
        // LOAD TITLE
        $this->data['pagetitle'] = "Welcome";

        // LOAD BREADCRUMB
        $this->data['breadcrumb'] = '<li class="breadcrumb-item"><a href="#">Dashboard</a></li>';

        // LOAD CSS 
        $this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/dashboard.css') . '">';
        // DEKLARASI VARIABEL
        $param['arrjoin']['video_kategori']['statement'] = 'video.id_kategori = video_kategori.id_kategori';
        $param['arrjoin']['video_kategori']['type'] = 'LEFT';
        $param['sort'] = 'create_date';
        $param['order'] = 'DESC';
        $select = 'video.*,video_kategori.nama AS kategori';
        $where['aktif'] = 'Y';
        // LOAD DATA 
        $result = $this->video_m->get_where_params($where, $select, $param);
        $kategori = $this->video_kategori_m->get_all();


        // LOAD MYDATA 
        $mydata['result'] = $result;
        $mydata['kategori'] = $kategori;
        $this->data['content'] = $this->load->view('index', $mydata, true);

        $this->display();
    }
}
