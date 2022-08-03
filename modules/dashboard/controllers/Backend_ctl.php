<?php defined('BASEPATH') or exit('No direct script access allowed');

class Backend_ctl extends MY_Mimin
{

    protected $id_user = '';
    protected $role = '';
    function __construct()
    {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('video_m');
        $this->load->model('video_kategori_m');
        $this->load->model('user_m');

        // LOAD SESSION
        $this->id_user = $this->session->userdata('hunago_id_user');
        $this->role = $this->session->userdata('hunago_role');
    }

    public function index()
    {

        // LOAD TITLE
        $this->data['pagetitle'] = "Dashboard";

        // LOAD PARENT
        $mydata['parent'] = 'Dashboard';

        // LOAD CSS 
        $this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/dashboard.css') . '">';
        // LOAD JS
        $this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/dashboard/dashboard.js"></script>';
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
        // LOAD DATA 


        // LOAD MYDATA 
        $mydata['result'] = $result;
        $mydata['kategori'] = $kategori;
        $this->data['content'] = $this->load->view('index', $mydata, true);
        $this->display();
    }
    public function tambah_video()
    {
        $arrVar['url'] = 'Url';
        $arrVar['id_kategori'] = 'Kategori';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $set[$var] = $$var;
                $arrAccess[] = true;
            }
        }


        if (!in_array(false, $arrAccess)) {
            if (!strpos($url, "youtu")) {
                $data['status'] = FALSE;
                $data['alert']['title'] = 'PERINGATAN';
                $data['alert']['message'] = 'Url tidak valid!';
                echo json_encode($data);
                exit;
            }
            $set['judul'] =  explode('</title>', explode('<title>', file_get_contents($url))[1])[0];
            $id = get_id_yt($url);
            $set['thumbnail'] = 'https://img.youtube.com/vi/' . $id . '/0.jpg';
            $set['create_by'] = $this->id_user;
            $set['create_date'] = date('Y-m-d H:i:s');
            $set['aktif'] = 'Y';
            $insert = $this->video_m->insert($set);
            if ($insert) {
                $data['modal']['id'] = '#modalTambahVideo';
                $data['modal']['action'] = 'hide';
                $data['load'][0]['parent'] = '#parent_video';
                $data['load'][0]['reload'] = base_url('dashboard') . ' #reload_video';
                $data['status'] = TRUE;
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['alert']['message'] = 'Berhasil menambah video!';
                echo json_encode($data);
                exit;
            } else {
                $data['status'] = FALSE;
                $data['alert']['title'] = 'PERINGATAN';
                $data['alert']['message'] = 'Gagal menambah video!';
                echo json_encode($data);
                exit;
            }
        } else {
            $data['status'] = FALSE;
            echo json_encode($data);
            exit;
        }
    }
}
