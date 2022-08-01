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

    public function tambah_kategori()
    {
        $arrVar['nama']    = 'Judul kategori';
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
            $insert = $this->video_kategori_m->insert($set);
            if ($insert) {
                $data['modal']['id'] = '#modalTambahKategori';
                $data['modal']['action'] = 'hide';
                $data['load'][0]['parent'] = '#parent_kategori';
                $data['load'][0]['reload'] = base_url('kategori_video') . ' #reload_kategori';
                $data['status'] = TRUE;
                $data['alert']['title'] = 'PEMBERITAHUAN';
                $data['alert']['message'] = 'Berhasil menambah kategori!';
                echo json_encode($data);
                exit;
            } else {
                $data['status'] = FALSE;
                $data['alert']['title'] = 'PERINGATAN';
                $data['alert']['message'] = 'Gagal menambah kategori!';
                echo json_encode($data);
                exit;
            }
        } else {
            $data['status'] = FALSE;
            echo json_encode($data);
            exit;
        }
    }
    public function hapus_kategori($id_kategori = NULL)
    {
        if ($id_kategori == NULL) {
            $this->session->set_flashdata('judul', 'PERINGATAN');
            $this->session->set_flashdata('message', 'Gagal menghapus kategori');
            $this->session->set_flashdata('icon', 'warning');
        } else {
            $delete = $this->video_kategori_m->delete($id_kategori);
            if ($delete) {
                $this->session->set_flashdata('judul', 'PEMBERITAHUAN');
                $this->session->set_flashdata('message', 'Berhasil menghapus kategori');
                $this->session->set_flashdata('icon', 'success');
            } else {
                $this->session->set_flashdata('judul', 'PERINGATAN');
                $this->session->set_flashdata('message', 'Gagal menghapus kategori');
                $this->session->set_flashdata('icon', 'warning');
            }
        }

        redirect('kategori_video');
    }
}
