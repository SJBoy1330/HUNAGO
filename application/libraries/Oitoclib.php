<?php 

class Oitoclib {

    var $CI;

    var $settings = "";

    public function __construct()
	{
        $this->CI = & get_instance();
    }

    public function get_user(){

        $username = $this->CI->session->userdata('instastudio_username');
        $this->CI->db->where('username', $username);
        $this->CI->db->from('user');
        $q = $this->CI->db->get();
        if ($q->num_rows()>0){
            $result = $q->result();
            return $result[0];
        }else{
            return false;
        }
    }
}



