<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Admin
{
    protected $id_user = '';
    protected $role = '';
    function __construct()
    {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('video_m');
        $this->load->model('video_tag_m');
        $this->load->model('video_kategori_m');
        $this->load->model('user_m');

        // LOAD SESSION
        $this->id_user = $this->session->userdata('hunago_id_user');
        $this->role = $this->session->userdata('hunago_role');
    }

    public function index()
    {
        if ($this->id_user != NULL) {
            redirect('dashboard');
        }

        // LOAD TITLE
        $this->data['pagetitle'] = "Welcome";

        // LOAD BREADCRUMB
        $this->data['breadcrumb'] = '<li class="breadcrumb-item"><a href="#">Dashboard</a></li>';

        // LOAD CSS 
        $this->data['css_add'][] = '<link rel="stylesheet" href="' . base_url('assets/css/page/dashboard.css') . '">';
        // LOAD JS
        $this->data['js_add'][] = '<script src="' . base_url() . 'assets/js/page/dashboard/dashboard.js"></script>';
        // DEKLARASI VARIABEL
        $search = $this->input->get('search');
        if ($search) {
            $param['search'] = $search;
            $param['columnsearch'][] = 'judul';
            $mydata['search'] = $search;
        } else {
            $mydata['search'] = '';
        }

        $param['arrjoin']['video_kategori']['statement'] = 'video.id_kategori = video_kategori.id_kategori';
        $param['arrjoin']['video_kategori']['type'] = 'LEFT';
        $param['sort'] = 'create_date';
        $param['order'] = 'DESC';
        $param['limit'] = 8;
        $select = 'video.*,video_kategori.nama AS kategori';
        $where['aktif'] = 'Y';
        $wheree['aktif'] = 'Y';
        $where['status_video'] = 1;
        $wheree['status_video'] = 2;
        // LOAD DATA 
        $result = $this->video_m->get_where_params($where, $select, $param);
        $rekomendasi = $this->video_m->get_where_params($wheree, $select, $param);
        $kategori = $this->video_kategori_m->get_all();


        // LOAD MYDATA 
        $mydata['rekomendasi'] = $rekomendasi;
        $mydata['result'] = $result;
        $mydata['kategori'] = $kategori;
        $mydata['search_action'] = 'action="' . base_url('welcome/index') . '"';
        $this->data['content'] = $this->load->view('index', $mydata, true);

        $this->display();
    }

    public function single($id_video = NULL)
    {
        // get data 
        $param['arrjoin']['user']['statement'] = 'video.create_by = user.id_user';
        $param['arrjoin']['user']['type'] = 'LEFT';
        $par['arrjoin']['tag']['statement'] = 'video_tag.id_tag = tag.id_tag';
        $par['arrjoin']['tag']['type'] = 'LEFT';
        $row = $this->video_m->get_where_params(array('id_video' => $id_video, 'video.aktif' => 'Y'), 'video.*,user.foto,user.nama AS nama_user', $param);
        $tag = $this->video_tag_m->get_where_params(array('video_tag.id_video' => $id_video), 'video_tag.*,tag.nama', $par);
        if ($tag) {
            $no = 0;
            foreach ($tag as $tg) {
                $num = $no++;
                $arr[$num] = $tg->id_tag;
            }
            $p['arrjoin']['video']['statement'] = 'video_tag.id_video = video.id_video';
            $p['arrjoin']['video']['type'] = 'LEFT';
            $p['wherein']['id_tag'] = $arr;
            $terkait = $this->video_tag_m->get_where_params(array('video.id_video !=' => $id_video), 'video.*', $p);
        } else {
            $terkait = NULL;
        }
        if ($this->id_user != NULL) {
            redirect('dashboard');
        } else {
            if (!$row) {
                redirect('welcome');
            }
        }
        $this->data['pagetitle'] = "Single Video";

        $mydata['parent'] = 'Single Video';



        $mydata['row'] = $row[0];
        $mydata['tag'] = $tag;
        $mydata['terkait'] = $terkait;

        $this->data['content'] = $this->load->view('single', $mydata, true);

        $this->display();
    }

    public function login_proses()
    {
        $arrVar['username']    = 'ID Pengguna';
        $arrVar['kata_sandi'] = 'Kata sandi';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!$$var) {
                $data['required'][] = ['req_' . $var, $value . ' tidak boleh kosong !'];
                $arrAccess[] = false;
            } else {
                $arrAccess[] = true;
            }
        }

        if (!in_array(false, $arrAccess)) {
            $get_user = $this->user_m->get_single(array('username' => $username));
            if ($get_user) {
                $password = hash('sha256', $username . $kata_sandi);
                if ($password == $get_user->password) {
                    $arrSession['hunago_id_user'] = $get_user->id_user;
                    $arrSession['hunago_role'] = $get_user->tipe;
                    $arrSession['hunago_name'] = $get_user->nama;
                    if ($get_user->foto != NULL) {
                        $arrSession['hunago_foto'] = base_url('assets/photos/' . $get_user->foto);
                    } else {
                        $arrSession['hunago_foto'] = base_url('assets/img/profil_default.png');
                    }



                    $this->session->set_userdata($arrSession);
                    $data['status'] = TRUE;
                    $data['alert']['title'] = 'PEMBERITAHUAN';
                    $data['alert']['message'] = 'Berhasil Masuk!';
                    $data['redirect'] = base_url('dashboard');
                    echo json_encode($data);
                    exit;
                } else {
                    $data['status'] = FALSE;
                    $data['alert']['title'] = 'PERINGATAN';
                    $data['alert']['message'] = 'Kata sandi salah!';
                    echo json_encode($data);
                    exit;
                }
            } else {
                $data['status'] = FALSE;
                $data['alert']['title'] = 'PERINGATAN';
                $data['alert']['message'] = 'User tidak di temukan!';
                echo json_encode($data);
                exit;
            }
        } else {
            $data['status'] = FALSE;
            echo json_encode($data);
            exit;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('hunago_id_user');
        $this->session->unset_userdata('hunago_role');
        $this->session->unset_userdata('hunago_name');
        $this->session->unset_userdata('hunago_foto');

        redirect('welcome');
    }
}
