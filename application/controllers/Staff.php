<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function time()
	{
		$user_data['user'] = $this->session->userdata('userdata');
		$this->load->view('templates/staff_header');
		$this->load->view('staff/time',$user_data);
	}
	public function timein()
	{
		$this->user_model->timein();
		$this->session->set_flashdata('success','Successful!');
		redirect('staff');
	}
}
