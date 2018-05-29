<?php

class User_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	
	public function loguser(){
		$username = $this->input->post('luname');
		$password = md5($this->input->post('lpassword'));

		$this->db->where('uname',$username);
		$this->db->where('password',$password);
		$this->db->where('user_status','active');
		$result = $this->db->get('user_tbl');
		$data = $result->result_array();

		if($result->num_rows()==1){
			return $data;
		}else{
			return false;
		}
	}

}

 ?>