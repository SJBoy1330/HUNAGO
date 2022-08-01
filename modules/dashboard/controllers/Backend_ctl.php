<?php defined('BASEPATH') or exit('No direct script access allowed');

class Backend_ctl extends MY_Mimin
{

    function __construct()
    {
        parent::__construct();

        // if (!$this->oitocauth->is_loggedin()) {
        //     redirect(site_url('auth/login_ctl'));
        // }

        // LOAD MODEL 
        $this->load->model('video_m');
    }

    public function index()
    {

        // LOAD TITLE
        $this->data['pagetitle'] = "Dashboard";

        // LOAD PARENT
        $mydata['parent'] = 'Dashboard';

        // DEKLARASI VARIABEL
        $param['arrjoin']['video_kategori']['statement'] = 'video.id_kategori = video_kategori.id_kategori';
        $param['arrjoin']['video_kategori']['type'] = 'LEFT';
        $param['sort'] = 'create_date';
        $param['order'] = 'DESC';
        $select = 'video.*,video_kategori.nama AS kategori';
        $where['aktif'] = 'Y';
        // LOAD DATA 
        $result = $this->video_m->get_where_params($where, $select, $param);


        // LOAD MYDATA 
        $mydata['result'] = $result;
        $this->data['content'] = $this->load->view('index', $mydata, true);
        $this->display();
    }
}
