<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function time()
	{
		$user_data['user'] = $this->session->userdata('userdata');
		$user_data['time_id'] = $this->session->userdata('timein_id');
		$user_data['timesheets'] = $this->user_model->getTimesheet();
		$this->load->view('templates/staff_header');
		$this->load->view('staff/time',$user_data);
	}
	public function timein()
	{
		$this->user_model->timein();
		$this->session->set_userdata('timein_id', $this->db->insert_id() );
		$data = $this->session->userdata('userdata');
		$data['is_timein'] = "yes";
		$this->session->set_userdata('userdata', $data); 
		$this->session->set_flashdata('success','Successful!');
		redirect('staff');
	}
	public function timeout()
	{
		$this->user_model->timeout();
		$this->session->set_userdata('timein_id', NULL );
		$data = $this->session->userdata('userdata');
		$data['is_timein'] = "no";
		$this->session->set_userdata('userdata', $data); 
		$this->session->set_flashdata('success','Successful!');
		redirect('staff');
	}
}
