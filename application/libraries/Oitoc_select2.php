<?php 

class Oitoc_select2 {

    var $CI;

    public function __construct()
	{
        $this->CI = & get_instance();
        $this->CI->load->model('select2_m', 's2');
    
    }

    public function get_outlet(){
        return $this->CI->s2->load_outlet();
    }

    public function get_keptoko(){
        return $this->CI->s2->load_keptoko();
    }

    public function get_divisi($pArray = NULL){
        return $this->CI->s2->load_divisi($pArray);
    }

    public function get_role($pArray = NULL){
        return $this->CI->s2->load_role($pArray);
    }

    public function get_employee($pArray = NULL){
        return $this->CI->s2->load_employee($pArray);
    }

    public function get_shift($pArray = NULL){
        return $this->CI->s2->load_shift($pArray);
    }

}