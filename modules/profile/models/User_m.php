<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class User_m extends MY_Model{

  	protected $_table_name = 'user';
    protected $_primary_key = 'id_user';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id_user";
    
    public function __construct() 
	{
		parent::__construct();
	}

	public function get_single_user($array=NULL){
		$query = parent::get_single($array);
		return $query;
	}

	public function get_user($array=NULL, $limit=20, $start=0){
		$query = parent::get_order_by($array, $limit, $start);
		return $query;
	}

	public function insert_user($array){
		$id=parent::insert($array);
		return $id;
	}

	public function update_user($data, $id=NULL){
		$res = parent::update($data, $id);
		return $res;

	}


}