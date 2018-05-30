<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function login()
	{
		$this->load->view('templates/login_header');
		$this->load->view('login/login');
	}
	public function dashboard()
	{
		$this->load->view('templates/dashboard_header');
		$this->load->view('admin/admin');
		$this->load->view('templates/dashboard_footer');
	}
	public function staff()
	{
		$user_data = $this->session->userdata();
		$this->load->view('templates/staff_header');
		$this->load->view('staff/staff',$user_data);
		$this->load->view('templates/staff_footer');
	}
	public function adduser()
	{
		$this->user_model->reguser();
		$this->session->set_flashdata('success','Successfully register');
		redirect('dashboard');
	}
	public function loginuser()
	{
		$data['userinfo'] = $this->user_model->loguser();
		if($data['userinfo']==True){
			if($data['userinfo'][0]['user_status']=='active'){
				if($data['userinfo'][0]['utype']==1){
					$userdata = $data['userinfo'][0];
					$this->session->set_userdata('userdata', $userdata);
					redirect('dashboard');
				}
				elseif($data['userinfo'][0]['utype']==2){
					$userdata = $data['userinfo'][0];
					$this->session->set_userdata('userdata', $userdata);
					redirect('staff');
				}
			}
			else{
				$this->session->set_flashdata('error','Account is Inactive');
				redirect('admin');
			}
			var_dump($data['userinfo']);
		}
		else{
			$this->session->set_flashdata('error','Incorrect credentials');
			redirect('admin');
		}
	}
}