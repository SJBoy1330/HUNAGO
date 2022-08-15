<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller {

	public function __construct() {
        parent::__construct();     

        $this->load->config('jwt');
        $this->load->library('Authorization_Token');

        
    }


	public function index_post(){


		$arrVar['kode_sekolah']         = 'Kode sekolah';
        $arrVar['username']    			= 'ID Pengguna';
        $arrVar['password'] 			= 'Kata sandi';
        foreach ($arrVar as $var => $value) {
            $$var = $this->input->post($var);
            if (!isset($$var)) {
				$response['status'] = 502;
	        	$response['error'] = true;
	        	$response['message']= $value. ' tidak boleh kosong';
	        	$this->response($response);
	            exit(0);
			}
        }
		
		$get_sekolah = $this->sekolah_m->get_single(array('kode_sekolah' => $kode_sekolah));
		if ($get_sekolah) {
			$get_siswa = $this->action_m->get_single($get_sekolah->server,'siswa',array('username' => $username));;

			if (isset($get_siswa)) {
				if (hash_my_password($get_sekolah->id_sekolah. $get_siswa->nis. $password) == $get_siswa->password) {
					// LOAD DATA RESPONZE
					$data['id_sekolah'] = $get_sekolah->id_sekolah;
					$data['id_siswa'] = $get_siswa->id_siswa;
					$data['server'] = $get_sekolah->server;
					$data['role'] = 'siswa';
					$response['status']=200;
		        	$response['error']=false;
		        	$response['message']= 'Berhasil masuk';
		        	$response['data'] = $data;
				}else{
					$response['status']=502;
		        	$response['error']=true;
		        	$response['message']= 'Kata sandi salah';
				}
			}else{
				$response['status']=502;
	        	$response['error']=true;
	        	$response['message']= 'ID pengguna tidak terdaftar';
			}
		}else{
			$response['status']=502;
        	$response['error']=true;
        	$response['message']= 'Kode sekolah tidak terdaftar';
		}

        
        $this->response($response);
        exit(0);
    }
    public function logout_post()
    {
    	$this->session->unset_userdata('live_server');
    	$response['status']=200;
        $response['error']=false;
       	$response['message']= 'Berhasil logout';

       	$this->response($response);
        exit(0);
    }
}
