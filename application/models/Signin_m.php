<?php if(!defined('BASEPATH')) exit('No direct script allowed');

/****
 * DEVELOPER: OITOC DEV
 * Author: Santo Doni Romadhoni
 * email: oitocdev@gmail.com
 * This is how magic works
 */

class Signin_m extends MY_Model{

    protected $_table_name = 'user';
    
    function __construct(){
        parent::__construct();
 
    }

    public function signin($username, $password){

        $username = strtolower($username);
        //encript password to sha256
        $password = hash('sha256',$username.$password);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->select($this->_table_name.'.*');
        $this->db->from($this->_table_name);
        $q = $this->db->get();

        if ($q->num_rows()>0){

            $result = $q->row();

            $arruser['instastudio_username'] = $result->username;
            $arruser['instastudio_id_user'] = $result->id_user;
            $arruser['instastudio_tipe'] = $result->tipe;
            $this->session->set_userdata($arruser);

            return true;
        }else{
            return false;
        }
    }

}