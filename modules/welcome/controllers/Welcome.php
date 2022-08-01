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
        $this->load->model('video_kategori_m');
        $this->load->model('user_m');

        // LOAD SESSION
        $this->id_user = $this->session->userdata('hunago_id_user');
        $this->role = $this->session->userdata('hunago_role');
    }

    public function index()
    {
        if ($this->role > 1) {
            redirect('dashboard');
        }
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
