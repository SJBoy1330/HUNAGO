<?php if(!defined('BASEPATH')) exit('No direct script allowed');

/****
 * DEVELOPER: OITOC DEV
 * Author: Santo Doni Romadhoni
 * email: oitocdev@gmail.com
 * This is how magic works
 */

class Permission_m extends MY_Model{

    protected $_table_name = 'tbl_permission';
    protected $_table_role = 'tbl_role'; 
    protected $_table_role_permission = 'tbl_role_permission';

    function __construct(){
        parent::__construct();

    }

    function get_permission($array=array()){

        if (isset($array['role']) && !empty($array['role'])){
            $this->db->where($this->_table_role_permission.'.id_role', $array['role']);
        }

        if (isset($array['is_menu'])){
            $this->db->where($this->_table_role_permission.'.is_menu',$array['is_menu']);
        }

        if (isset($array['status'])){
            $this->db->where($this->_table_name.'.status', $array['status']);
        }

        $this->db->join($this->_table_name, $this->_table_name.'.permission_id = '.$this->_table_role_permission.'.id_permission', 'RIGHT');
        $this->db->from($this->_table_role_permission);
        $q = $this->db->get();
        if ($q->num_rows()>0){
            return $q->result();
        }else{
            return false;
        }
    }

    function get_child($parent_id=0){

        $this->db->order_by('urutan', 'asc');
        $this->db->where('status',1);
        $this->db->where("url != ''"); 
        $this->db->where('parent_id', $parent_id);
        $this->db->from($this->_table_name);
        $q=$this->db->get();
        if ($q->num_rows()>0){
            return $q->result();
        }else{
            return false;
        }
    }

    function count_all_menu(){
        $this->db->where('is_menu', 1);
        $this->db->from($this->_table_name);
        $cnt = $this->db->count_all_results(); 
        return $cnt;
    }

    function add_role_permission($permission_id, $id_role){
        $array = array(
            'id_permission' => $permission_id, 'id_role' => $id_role
        );
        
        $this->db->insert($this->_table_role_permission,$array);
    }

    function delete_role_permission_by_perms($permission_id){
        $this->db->where('id_permission', $permission_id);
        return $this->db->delete($this->_table_role_permission);
    }

    function delete_role_permission_by_role($role_id){

        $this->db->where('id_role', $role_id);
        return $this->db->delete($this->_table_role_permission);
    }
}