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

	public function getTimesheet()
	{	

		$this->db->where('user_id',$this->session->userdata('userdata')['id']);
		$this->db->order_by('date', 'desc');
		$result = $this->db->get('timesheets_tbl');
		return $result->result();
	}

	public function assigntask()
	{
		$data = array(
			'user_id' => $this->input->post('uid'),
			'task' => $this->input->post('task')
		);

		$this->db->insert('task_tbl',$data);
	}

	public function getmytask()
	{
		$this->db->where('user_id',$this->session->userdata('userdata')['id']);
		$this->db->order_by('date_created', 'desc');
		$result = $this->db->get('task_tbl');
		return $result->result();
	}

	public function markdone($uid)
	{
		$this->db->set('status','done');
		$this->db->where('id',$uid);
		$this->db->update('task_tbl');
	}

	public function markapprove($uid)
	{
		$this->db->set('status','approved');
		$this->db->where('id',$uid);
		$this->db->update('leave_tbl');
	}

	public function submitleave()
	{
		$data = array(
			'user_id' => $this->session->userdata('userdata')['id'],
			'date_from' => date('Y-m-d',strtotime($this->input->post('datefrom'))),
			'date_to' => date('Y-m-d',strtotime($this->input->post('dateto'))),
			'reason' => $this->input->post('reason')
		);
		$this->db->insert('leave_tbl',$data);
	}

	public function get_my_leave()
	{
		$this->db->where('user_id',$this->session->userdata('userdata')['id']);
		$this->db->order_by('date_created','desc');
		$query = $this->db->get('leave_tbl');
		return $query->result();
	}

}

 ?>