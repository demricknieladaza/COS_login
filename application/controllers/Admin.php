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
	}
	public function loginuser()
	{
		$data['userinfo'] = $this->user_model->loguser();
		if($data['userinfo']==True){
			// if($data['userinfo'][0]['user_status']=='active'){
			// 	if($data['userinfo'][0]['user_type']==1){
			// 		$userdata = $data['userinfo'][0];
			// 		$this->session->set_userdata($userdata);
			// 		$this->load->view('templates/admin_header');
			// 		$this->load->view('admin/admin');
			// 		$this->load->view('templates/admin_footer');
			// 	}
			// 	elseif($data['userinfo'][0]['user_type']==2){
			// 		echo ('hello user');
			// 	}
			// }
			// else{
			// 	$this->session->set_flashdata('error','Account is Inactive');
			// 	redirect('login');
			// }
			redirect('dashboard');
			var_dump($data['userinfo']);
		}
		else{
			$this->session->set_flashdata('error','Incorrect credentials');
			redirect('admin');
		}
	}
}
