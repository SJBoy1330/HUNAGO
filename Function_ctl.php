<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Function_ctl extends MY_Frontend {

	public function __construct()

    {
        // Load the constructer from MY_Controller

        parent::__construct();
        // LOAD MODEL
        $this->load->model('ujian_m');
        $this->load->model('paket_ujian_m');
        $this->load->model('soal_ujian_m');
        $this->load->model('ujian_detail_m');
        $this->load->model('kelompok_soal_m');

    }
    public function index()
    {
    	redirect('dashboard');
    }
    public function register_ujian()
	{
		$id_paket_ujian = $this->input->post('id_paket_ujian');
		$get = $this->paket_ujian_m->get_single(array('id_paket_ujian' => $id_paket_ujian));
		$time = new DateTime($get->jadwal);
		$time->add(new DateInterval('PT' . $get->waktu . 'M'));
		$waktu_akhir = $time->format('Y-m-d H:i:s');
		$arrInsert = array(
			'id_paket_ujian' 	=> $id_paket_ujian,
			'id_siswa'			=> $this->session->userdata('ujian_id_siswa'), 
			'waktu_mulai'		=> $get->jadwal,
			'waktu_akhir'		=> $waktu_akhir,
			'waktu_selesai'		=> NULL,
			'jumlah_benar'		=> NULL,
			'jumlah_salah'		=> NULL,
			'jumlah_kosong'		=> NULL,
			'nilai'				=> NULL,
			'selesai'			=> 'N'
		);
		$insert = $this->ujian_m->insert($arrInsert);
		// DAFTAR UJIAN (INSERT KE TABEL UJIAN)
		if ($insert) {
			$this->db->set('id_ujian',$insert);
			$this->db->where('id_siswa',$this->session->userdata('ujian_id_siswa'));
			$update_siswa = $this->db->update('siswa');
			// UPDATE STATUS UJIAN DI SISWA
			if ($update_siswa) {
				$get_kel_soal = $this->kelompok_soal_m->get_all(array('id_paket_ujian' => $id_paket_ujian));
				// CEL JIKA SOAL DOI RANDOM
				if ($get->random_soal == 'Y') {
					$arrParams['arrjoin']['soal']['statement'] = 'soal.id_soal = soal_ujian.id_soal';
					$arrParams['arrjoin']['soal']['type'] = 'LEFT';
					// shuffle array(acek array)
					foreach ($get_kel_soal as $val) {
						$get_soal_ujian[] = shuffle_assoc(obj_to_array($this->soal_ujian_m->get_where_params(array('id_kelompok_soal' => $val->id_kelompok_soal),'*',$arrParams)));
					}
					// var_dump($get_soal_ujian);die;
					$no = 1;
					// loop dan insert ke tabel ujian detail
					foreach ($get_soal_ujian as $key) {
						foreach ($key as $row) {
							$num = $no++;
							$insertDetail[$num]['id_ujian'] = $insert;
							$insertDetail[$num]['id_soal'] = $row['id_soal'];
							$insertDetail[$num]['id_kelompok_soal'] = $row['id_kelompok_soal'];
							if ($row['tipe'] == 3 || $row['tipe'] == 4) {
								$insertDetail[$num]['pilihan_jawaban'] = NULL;
								$insertDetail[$num]['daftar_pertanyaan'] = NULL;
								$insertDetail[$num]['daftar_jawaban'] = NULL;
							}elseif ($row['tipe'] == 5) {
								$arr_dtanya[$num] = count(obj_to_array(json_decode($row['daftar_pertanyaan'])));
								$arr_djawab[$num] = count(obj_to_array(json_decode($row['daftar_jawaban'])));
								for ($i=1; $i <= $arr_dtanya[$num]; $i++) { 
									$arrDtanya[$num][] = $i;
								}
								for ($i=1; $i <= $arr_djawab[$num]; $i++) { 
									$arrDjawab[$num][] = $i;
								}
								$insertDetail[$num]['pilihan_jawaban'] = NULL;
								if ($get->random_jawaban == 'Y') {
									$rand_dtanya = shuffle_assoc($arrDtanya[$num]);
									$rand_djawab = shuffle_assoc($arrDjawab[$num]);
									$insertDetail[$num]['daftar_pertanyaan'] = json_encode($rand_dtanya);
									$insertDetail[$num]['daftar_jawaban'] = json_encode($rand_djawab);
								}else{
									$insertDetail[$num]['daftar_pertanyaan'] = json_encode($arrDtanya[$num]);
									$insertDetail[$num]['daftar_jawaban'] = json_encode($arrDjawab[$num]);
								}
							}else{
								$arr_jawab[$num] = count(obj_to_array(json_decode($row['jawaban'])));
								for ($i=1; $i <= $arr_jawab[$num]; $i++) { 
									$arrJawab[$num][] = $i;
								}
								if ($get->random_jawaban == 'Y') {
									$rand_pilgan = shuffle_assoc($arrJawab[$num]);
									$insertDetail[$num]['pilihan_jawaban'] = json_encode($rand_pilgan);
								}else{
									$insertDetail[$num]['pilihan_jawaban'] = json_encode($arrJawab[$num]);
								}

								$insertDetail[$num]['daftar_pertanyaan'] = NULL;
								$insertDetail[$num]['daftar_jawaban'] = NULL;
							}
							$insertDetail[$num]['jawaban'] = NULL;
							$insertDetail[$num]['ragu'] = 'N';
							$insertDetail[$num]['koreksi'] = NULL;
							$insertDetail[$num]['nilai'] = NULL;

						}
					}
					$insert_detail = $this->db->insert_batch('ujian_detail', $insertDetail); 
					if ($insert_detail) {
						$first_number = $this->db->get_where('ujian_detail',['id_ujian' => $insert])->row();
						$this->session->set_userdata('ujian_aktif_number',$first_number->id_ujian_detail);
						$return['redirect'] = base_url('start/index/'.$insert);
						sleep(1.5);
						echo json_encode($return);
						exit;
					}else{
						$delete = $this->ujian_m->delete($insert);
						$this->db->set('id_ujian',NULL);
						$this->db->where('id_siswa',$this->session->userdata('ujian_id_siswa'));
						$update_siswa = $this->db->update('siswa');
						$return['status'] = false;
						$return['alert']['title'] = 'PERINGATAN';
						$return['alert']['text'] = 'Gagal mendaftar ujian!';
						$return['console'] = 'Gagal insert detail';
						$return['redirect'] = base_url('dashboard/instruksi/'.$id_paket_ujian);
						sleep(1.5);
						echo json_encode($return);
						exit;
					}
					
				}else{
					$arrParams['arrjoin']['soal']['statement'] = 'soal.id_soal = soal_ujian.id_soal';
					$arrParams['arrjoin']['soal']['type'] = 'LEFT';
		        	$arrParams['wherein']['id_kelompok_soal'] = $get_kel_soal;
					$get_soal_ujian = $this->soal_ujian_m->get_where_params(array(),'*',$arrParams);
					$no = 1;
					foreach ($get_soal_ujian as $row) {
						$num = $no++;
						$insertDetail[$num]['id_ujian'] = $insert;
						$insertDetail[$num]['id_soal'] = $row->id_soal;
						$insertDetail[$num]['id_kelompok_soal'] = $row->id_kelompok_soal;
						if ($row->tipe == 3 || $row->tipe == 4) {
							$insertDetail[$num]['pilihan_jawaban'] = NULL;
							$insertDetail[$num]['daftar_pertanyaan'] = NULL;
							$insertDetail[$num]['daftar_jawaban'] = NULL;
						}elseif ($row->tipe == 5) {
							$arr_dtanya[$num] = count(obj_to_array(json_decode($row->daftar_pertanyaan)));
							$arr_djawab[$num] = count(obj_to_array(json_decode($row->daftar_jawaban)));
							for ($i=1; $i <= $arr_dtanya[$num]; $i++) { 
								$arrDtanya[$num][] = $i;
							}
							for ($i=1; $i <= $arr_djawab[$num]; $i++) { 
								$arrDjawab[$num][] = $i;
							}
							$insertDetail[$num]['pilihan_jawaban'] = NULL;
							if ($get->random_jawaban == 'Y') {
								$insertDetail[$num]['daftar_pertanyaan'] = json_encode(shuffle_assoc($arrDtanya[$num]));
								$insertDetail[$num]['daftar_jawaban'] = json_encode(shuffle_assoc($arrDjawab[$num]));
							}else{
								$insertDetail[$num]['daftar_pertanyaan'] = json_encode($arrDtanya[$num]);
								$insertDetail[$num]['daftar_jawaban'] = json_encode($arrDjawab[$num]);
							}
						}else{
							$arr_jawab[$num] = count(obj_to_array(json_decode($row->jawaban)));
							for ($i=1; $i <= $arr_jawab[$num]; $i++) { 
								$arrJawab[$num][] = $i;
							}
							if ($get->random_jawaban == 'Y') {
								$insertDetail[$num]['pilihan_jawaban'] = json_encode(shuffle_assoc($arrJawab[$num]));
							}else{
								$insertDetail[$num]['pilihan_jawaban'] = json_encode($arrJawab[$num]);
							}
							$insertDetail[$num]['daftar_pertanyaan'] = NULL;
							$insertDetail[$num]['daftar_jawaban'] = NULL;
						}
						$insertDetail[$num]['jawaban'] = NULL;
						$insertDetail[$num]['ragu'] = 'N';
						$insertDetail[$num]['koreksi'] = 'N';
						$insertDetail[$num]['nilai'] = NULL;
					}

					$insert_detail = $this->db->insert_batch('ujian_detail', $insertDetail); 
					if ($insert_detail) {
						$first_number = $this->db->get_where('ujian_detail',['id_ujian' => $insert])->row();
						$this->session->set_userdata('ujian_aktif_number',$first_number->id_ujian_detail);
						$return['redirect'] = base_url('start/index/'.$insert);
						sleep(1.5);
						echo json_encode($return);
						exit;
					}else{
						$delete = $this->ujian_m->delete($insert);
						$this->db->set('id_ujian',NULL);
						$this->db->where('id_siswa',$this->session->userdata('ujian_id_siswa'));
						$update_siswa = $this->db->update('siswa');
						$return['status'] = false;
						$return['alert']['title'] = 'PERINGATAN';
						$return['alert']['text'] = 'Gagal mendaftar ujian!';
						$return['console'] = 'Gagal insert detail(random = N)';
						$return['redirect'] = base_url('dashboard/instruksi/'.$id_paket_ujian);
						sleep(1.5);
						echo json_encode($return);
						exit;
					}
				}
			}else{
				$delete = $this->ujian_m->delete($insert);
				$return['status'] = false;
				$return['alert']['title'] = 'PERINGATAN';
				$return['alert']['text'] = 'Gagal mendaftar ujian!';
				$return['console'] = 'Gagal update ke tabel siswa';
				$return['redirect'] = base_url('dashboard/instruksi/'.$id_paket_ujian);
				sleep(1.5);
				echo json_encode($return);
				exit;
			}
		}else{
			$return['status'] = false;
			$return['alert']['title'] = 'PERINGATAN';
			$return['alert']['text'] = 'Gagal mendaftar ujian!';
			$return['console'] = 'Gagal insert';
			$return['redirect'] = base_url('dashboard/instruksi/'.$id_paket_ujian);
			sleep(1.5);
			echo json_encode($return);
			exit;
		}
	}






    public function ragu($nilai = 'Y')
    {
        $id = $this->session->userdata('ujian_aktif_number');
        $id_ujian = $this->input->post('id_ujian');
        $keys = 'ragu_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$id;
        if (cek_redis($id_ujian,$id)) {
            $data['jawaban'] = true;
        }else{
            $data['jawaban'] = false;
        }
        if ($nilai == 'Y') {
            $this->oitocredis->appenddata($keys, true, 99999999);
        }else{
            $this->oitocredis->deletekeys($keys);
        }
        $data['status'] = true;
        $data['id_soal'] = $id;
        echo json_encode($data);
    }

    // SIMPAN MULTIPLE CHOICE
    public function pilgan_save()
    {
        $jawab = $this->input->post('jawab');
        $id_soal = $this->session->userdata('ujian_aktif_number');
        $id_ujian = $this->input->post('id_ujian');
        $ragu = $this->ujian_detail_m->get_single(array('id_ujian_detail' => $id_soal));
        $keys = 'jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$id_soal;

        $cek = $this->oitocredis->appenddata($keys, $jawab, 99999999);
        $data['status'] = true;
        $data['id_soal'] = $id_soal;
        if (cek_redis_ragu($id_ujian, $id_soal)) {
            $data['ragu'] = true;
        }else{
            $data['ragu'] = false;
        }
        echo json_encode($data);
    }


    // SIMPAN MULTIPLE CHOICE GANDA
    public function multiple_pilgan_save()
    {
        $jawab = $this->input->get('mul_pilgan');
        foreach ($jawab as $row) {
            $array[] = intval($row);
        }

        $id_soal = $this->input->post('id_soal');
        $id_ujian = $this->input->post('id_ujian');
        $ragu = $this->ujian_detail_m->get_single(array('id_ujian_detail' => $id_soal));
        $keys = 'jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$id_soal;
        $data['array'] = $array; 
        if ($jawab) {
            $this->oitocredis->appenddata($keys, json_encode($array), 99999999);
            $data['status'] = true;
        }else{
            $this->oitocredis->deletekeys($keys);
            $data['status'] = false;
        }
        if (cek_redis_ragu($id_ujian, $id_soal)) {
            $data['ragu'] = true;
        }else{
            $data['ragu'] = false;
        }
        echo json_encode($data);
    }

    // SIMPAN MULTIPLE CHOICE GANDA
    public function essai_save()
    {
        $jawab = $this->input->post('jawab');
        $id_soal = $this->input->post('id_soal');
        $id_ujian = $this->input->post('id_ujian');
        $ragu = $this->ujian_detail_m->get_single(array('id_ujian_detail' => $id_soal));
        $keys = 'jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$id_soal;
        if ($jawab) {
            $this->oitocredis->appenddata($keys, $jawab, 99999999);
            $data['status'] = true;
        }else{
            $this->oitocredis->deletekeys($keys);
            $data['status'] = false;
        }
        if (cek_redis_ragu($id_ujian, $id_soal)) {
            $data['ragu'] = true;
        }else{
            $data['ragu'] = false;
        }
        echo json_encode($data);
    }


    // SIMPAN SOAL PENJODOHAN
    public function penjodohan_save()
    {
        $jawab = $this->input->get('jodoh');
        foreach ($jawab as $row => $value) {
            $array[$row] = intval($value);
        }
        $id_soal = $this->input->post('id_soal');
        $id_ujian = $this->input->post('id_ujian');
        $ragu = $this->ujian_detail_m->get_single(array('id_ujian_detail' => $id_soal));
        $keys = 'jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$id_soal;
        if ($jawab) {
            $this->oitocredis->appenddata($keys, json_encode($array), 99999999);
            $data['status'] = true;
        }else{
            $this->oitocredis->deletekeys($keys);
            $data['status'] = false;
        }
        if (cek_redis_ragu($id_ujian, $id_soal)) {
            $data['ragu'] = true;
        }else{
            $data['ragu'] = false;
        }
        echo json_encode($data);
    }


    // CEK SEBELUM DI SUBMIT
    public function cek_jawaban_ujian()
    {
        $id_ujian = $this->input->post('id_ujian');
        $cek_kosong = $this->ujian_detail_m->get_all(array('id_ujian' => $id_ujian));
        foreach ($cek_kosong as $row) {
            if (cek_redis_ragu($row->id_ujian,$row->id_ujian_detail)) {
                $ragu[] = true;
            }
            if ($this->oitocredis->getkeysvalue('jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$row->id_ujian_detail)) {
                $value = $this->oitocredis->getkeysvalue('jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_'.$row->id_ujian_detail)[0]; 
            }else{
                $value = 'ksg';
            }
            $nomor_kosong[] = $value; 
        }
        $kosong = array_count_values($nomor_kosong)['ksg'];
        if ($ragu) {
            $data['jmlh_ragu'] = count($ragu);
        }else{
            $data['jmlh_ragu'] = null;
        }
        if ($kosong) {
            $data['jmlh_kosong'] = $kosong;
        }else{
            $data['jmlh_kosong'] = null;
        }
        if (!$cek_ragu && !$kosong) {
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        sleep(1.5);
        echo json_encode($data);
    }


    // SIMPAN JAWABAN UJIAN

    public function submit_jawaban($id_ujian = NULL,$cache = NULL)
    {
    	if($id_ujian == NULL){
    		redirect('dashboard');
    	}
        // LOAD DATA
        $where['id_ujian'] = $id_ujian;
        $select = "id_ujian_detail, ujian_detail.id_soal, soal.tipe, soal.kunci, skor_benar, skor_salah, skor_penjodohan";
        $params['arrjoin']['soal']['statement'] = 'soal.id_soal = ujian_detail.id_soal';
        $params['arrjoin']['soal']['type'] = 'LEFT';
        $params['arrjoin']['soal_ujian']['statement'] = 'soal_ujian.id_soal = soal.id_soal';
        $params['arrjoin']['soal_ujian']['type'] = 'LEFT';
        $loop = $this->ujian_detail_m->get_where_params($where, $select, $params);

        // NAME REDIS
        $name = 'jawaban_siswa_'.$this->session->userdata('ujian_id_sekolah').'_'.$this->session->userdata('ujian_id_siswa').'_'.$id_ujian.'_';

        // CEK IT
        foreach ($loop as $row) {
            $jawaban_user = $this->oitocredis->getkeysvalue($name.$row->id_ujian_detail)[0];
            $set['jawaban'] = $jawaban_user;
            if ($jawaban_user != NULL) {
                if ($row->tipe == 1) {
                    if ($jawaban_user == $row->kunci) {
                        $jumlah_benar[] = true;
                        $jumlah_nilai[] = $row->skor_benar;
                        $set['nilai'] = $row->skor_benar;
                        $set['koreksi'] = 'Y';
                    }else{
                        $jumlah_salah[] = true;
                        $jumlah_nilai[] = $row->skor_salah;
                        $set['nilai'] = $row->skor_salah;
                        $set['koreksi'] = 'N';
                    }
                }elseif ($row->tipe == 2) {
                    $jawaban = json_decode($jawaban_user);
                    $kunci = json_decode($row->kunci);
                    if (count($jawaban) == count($kunci)) {
                        $cek_sama = count(array_intersect($kunci,$jawaban));
                        if ($cek_sama == count($kunci)) {
                            $jumlah_benar[] = true;
                            $jumlah_nilai[] = $row->skor_benar;
                            $set['nilai'] = $row->skor_benar;
                            $set['koreksi'] = 'Y';
                        }else{
                            $jumlah_salah[] = true;
                            $jumlah_nilai[] = $row->skor_salah;
                            $set['nilai'] = $row->skor_salah;
                            $set['koreksi'] = 'N';
                        }
                    }else{
                        $jumlah_salah[] = true;
                        $jumlah_nilai[] = $row->skor_salah;
                        $set['nilai'] = $row->skor_salah;
                        $set['koreksi'] = 'N';
                    }
                }elseif ($row->tipe == 3) {
                    if (mb_strtolower(trim($jawaban_user),'UTF-8') == mb_strtolower(trim($row->kunci),'UTF-8')) {
                        $jumlah_benar[] = true;
                        $jumlah_nilai[] = $row->skor_benar;
                        $set['nilai'] = $row->skor_benar;
                        $set['koreksi'] = 'Y';
                    }else{
                        $jumlah_salah[] = true;
                        $jumlah_nilai[] = $row->skor_salah;
                        $set['nilai'] = $row->skor_salah;
                        $set['koreksi'] = 'N';
                    }
                }elseif ($row->tipe == 4) {
                    $jumlah_nilai[] = 0;
                    $set['nilai'] = 0;
                    $set['koreksi'] = NULL;
                }elseif ($row->tipe == 5) {
                    $jawab = obj_to_array(json_decode($jawaban_user));
                    $kunci = obj_to_array(json_decode($row->kunci));
                    $hitung = count($kunci);
                    $jodoh = obj_to_array(json_decode($row->skor_penjodohan));
                    for ($i=1; $i <= $hitung ; $i++) { 
                        if ($jawab[$i] == $kunci[$i]) {
                           $status = 'benar';
                        }else{
                            $status = 'salah';
                        }
                        $nilai[$row->id_ujian_detail][$i] = $jodoh[$i][$status];
                    }
                    $num = array_sum($nilai[$row->id_ujian_detail]);
                    $jumlah_nilai[] = $num;
                    $set['nilai'] = $num;
                    if ($num != 0) {
                        $set['koreksi'] = 'Y';
                    }else{
                        $set['koreksi'] = 'N';
                    }
                }else{
                    $jumlah_kosong[] = true;
                    $jumlah_nilai[] =0;
                    $set['nilai'] = 0;
                    $set['koreksi'] = NULL;
                }
            }else{
                $jumlah_kosong[] = true;
                $jumlah_nilai[] = 0;
                $set['nilai'] = 0;
                $set['koreksi'] = 'N'; 
            }
            if (cek_redis_ragu($row->id_ujian,$row->id_ujian_detail)) {
                $ragu = "Y";
            }else{
                $ragu = "N";
            }
            $this->ujian_detail_m->update($set,$row->id_ujian_detail);
        }
        foreach ($loop as $row) {
             $this->oitocredis->deletekeys($name.$row->id_ujian_detail);
        }
        $get_nilai = $this->db->get_where('ujian_detail',['id_ujian' => $id_ujian])->result();

        foreach ($get_nilai as $poin) {
        	$nilai_seluruh[] = $poin->nilai;
        }
        $sum_nilai = array_sum($nilai_seluruh);
        $set_ujian['nilai'] = $sum_nilai;
        $set_ujian['jumlah_benar'] = count($jumlah_benar);
        $set_ujian['jumlah_salah'] = count($jumlah_salah);
        $set_ujian['jumlah_kosong'] = count($jumlah_kosong);
        $set_ujian['selesai'] = 'Y';
        $set_ujian['waktu_selesai'] = date('Y-m-d H:i:s');
        $update = $this->ujian_m->update($set_ujian,$id_ujian);
        if ($update) {
        	$this->db->set('id_ujian',NULL);
			$this->db->where('id_siswa',$this->session->userdata('ujian_id_siswa'));
			$update_siswa = $this->db->update('siswa');
			if ($update_siswa) {
				$this->session->unset_userdata('ujian_aktif_number');
				$status = true;
            	$kembali['redirect'] = base_url('start/after_exam/'.$id_ujian);
            	$kembali['path'] = 'start/after_exam/'.$id_ujian;
			}else{
				$status = true;
				$this->session->unset_userdata('ujian_aktif_number');
            	$kembali['redirect'] = base_url('start/after_exam/'.$id_ujian);
            	$kembali['path'] = 'start/after_exam/'.$id_ujian;
			}
        }else{
        	$status = false;
        	$kembali['redirect'] = base_url('start/index/'.$id_ujian);
        	$kembali['path'] = 'start/index/'.$id_ujian;
        }

        if ($cache != NULL) {
        	if ($status == true) {
        		redirect('start/after_exam/'.$id_ujian);
        	}else{
        		redirect('start/index/'.$id_ujian);
        	}
        }else{
        	echo json_encode($kembali);
        }
    }

    // SET SESSION
    public function get_exam_by_number($button = NULL)
    {
        $id_ujian = $this->input->post('id_ujian');
        $id = $this->input->post('id');
        if ($button == NULL) {
            $id_soal = $id;
        }else{
            if ($button == 'next') {
                if ($this->input->post('last_number') == $id) {
                    $id_soal = $id;
                }else{
                    $id_soal = $id + 1;
                }
            }else{
                if ($this->input->post('first_number') == $id) {
                    $id_soal = $id;
                }else{
                    $id_soal = $id - 1;
                }
            }
        }
        $this->session->set_userdata('ujian_aktif_number',$id_soal);
        $data['id_soal'] = $id_soal;
        $data['status'] = true;
        if (cek_redis_ragu($id_ujian,$id_soal)) {
           $data['ragu'] = true;
        }else{
            $data['ragu'] = false;
        }
        echo json_encode($data);
    }

    // NANTI DI HAPUS
    public function cek_redis()
    {
        $cek = $this->oitocredis->getkeysvalue('*');
        var_dump($cek);die;
    }
    public function cek_array()
    {
        $satu = array(1,2);
        $dua = array(1,2,3);

        $cek = array_intersect($satu,$dua);

        var_dump($cek);
    }
    public function cek_ujian_detail($id = NULL)
    {
        if ($id != NULL) {
            $cek = $this->ujian_detail_m->get_single(array('id_ujian_detail' => $id));
        }else{
            $cek = $this->ujian_detail_m->get_ujian_detail_all(array('id_ujian' => 309));
        }
        var_dump($cek);die;
    }
    public function cek_ujian()
    {
        $cek = $this->ujian_m->get_single_ujian(array('id_ujian' => 266));
        var_dump($cek);die;
    }
    public function cek_presensi_detail()
    {
        $cek = $this->db->get_where('presensi_detail')->result();
        var_dump($cek);
    }
    public function cek_my_statement()
    {
        $array = json_decode('{"1":{"benar":4,"salah":0},"2":{"benar":4,"salah":0},"3":{"benar":4,"salah":0}}');
        // var_dump($array);
        foreach ($array as $key => $value) {
            var_dump($value->benar);
        }
    }

}
