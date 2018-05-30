<?php

class User_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	
	public function loguser()
	{
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

	public function reguser()
	{
		$data = array(
			'fname'=>$this->input->post('fname'),
			'lname'=>$this->input->post('lname'),
			'uname'=>$this->input->post('fname'),
			'password'=> md5('password'),
			'utype'=> 2
		);
		return $this->db->insert('user_tbl',$data);
	}

	public function timein()
	{
		$this->db->where('id',$this->input->post('uid'));
		$this->db->set('is_timein','yes');
		$this->db->update('user_tbl');
		$data = array(
			'user_id'=>$this->input->post('uid'),
			'note'=>$this->input->post('note')
		);
		$this->db->set('time_in', 'NOW()', FALSE);
		$this->db->insert('timesheets_tbl',$data);
		return $this->db->insert_id();
	}
	public function timeout()
	{
		$this->db->where('id',$this->input->post('uid'));
		$this->db->set('is_timein','no');
		$this->db->update('user_tbl');
		$data = array(
			'user_id'=>$this->input->post('uid'),
			'note'=>$this->input->post('note')
		);
		$this->db->where('id',$this->input->post('tid'));
		$this->db->set('time_out', 'NOW()', FALSE);
		return $this->db->update('timesheets_tbl');
	}

}

 ?>