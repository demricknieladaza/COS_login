<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function login()
	{
		$this->load->view('templates/login_header');
		$this->load->view('Login/login');
	}

	public function dashboard()
	{
        $staffs = array();
        $staff = $this->user_model->get_online_staff();
        foreach ($staff as $row) {
            $time = $this->user_model->get_time($row->id);
            $staffs_sub = array();
            $staffs_sub['id'] =$row->id;
            $staffs_sub['name'] =$row->fname." ".$row->fname;
            $staffs_sub['timein'] = $time['time_in'];
            $staffs_sub['timeout'] = $time['time_out'];

            $staffs[] = $staffs_sub;
        }
        $data['staffs']=$staffs;    
		$this->load->view('templates/dashboard_header');
		$this->load->view('admin/admin',$data);
		$this->load->view('templates/dashboard_footer');
	}

	public function staff()
	{
		$user_data = $this->session->userdata();
		$this->load->view('templates/staff_header');
		$this->load->view('staff/staff',$user_data);
		$this->load->view('templates/staff_footer');
	}

    public function changepass()
    {
        $this->load->view('templates/staff_header');
        $this->load->view('admin/change_pass');
        $this->load->view('templates/staff_footer');
    }

    public function adchangepass()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('admin/change_pass');
        $this->load->view('templates/dashboard_footer');
    }

	public function manage_staff()
	{
		$this->load->view('templates/dashboard_header');
		$this->load->view('admin/manage_staff');
		$this->load->view('templates/dashboard_footer');
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
					redirect('staff/time');
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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function getuser()  
	{  
	 $output = array();  
	 $this->load->model("user/Staff_model","staff_model");  
	 $data = $this->staff_model->get_user($_POST["user_id"]);  
	 foreach($data as $row)  
	 {  
	      $output['fname'] = $row->fname;  
	      $output['id'] = $row->id;
	      $output['lname'] = $row->lname;
	 }  
	 echo json_encode($output);  
	}

	public function fetch_user()
	{  
    	$this->load->model("user/Staff_model","staff_model");
    	$fetch_data = $this->staff_model->make_datatables();
    	$data = array();
    	foreach ($fetch_data as $row) 
    	{
    		$sub_array = array();
    		$sub_array[] = $row->id;
    		$sub_array[] = $row->fname;
            $sub_array[] = $row->lname;
    		if($row->utype=='admin'){
    			$sub_array[] = 'ADMIN';
    		}
    		else{
    			$sub_array[] = '<button type="button" id="'.$row->id.'" class="btn btn-warning btn-xs assign">Assign Task</button> <a href="'.base_url().'admin/calctime/'.$row->id.'"><button type="button" id="'.$row->id.'" class="btn btn-success btn-xs calc">Calculate Time</button>';
    		}
    		
    		$data[] = $sub_array;
    	}

    	$output = array(
    		"draw" => intval($_POST["draw"]),
    		"recordsTotal" => $this->staff_model->get_all_data(),
    		"recordsfiltered" => $this->staff_model->get_filtered_data(),
    		"data"	=> $data
    	);
    	echo json_encode($output);	
    }

    public function changemypass()
    {
        $data = $this->user_model->changepass();
        if($data == True){
            $this->user_model->changethepass();
            $this->session->set_flashdata('success','Success');
        }
        else{
            $this->session->set_flashdata('error','Wrong Password');
        }
        redirect('admin/changepass');
    }

    public function fetch_task()
    {  
    	$this->load->model("user/Staff_task_model","staff_task_model");
    	$fetch_data = $this->staff_task_model->make_datatables();
    	$data = array();
    	foreach ($fetch_data as $row) 
    	{
    		$name = $this->staff_task_model->get_user($row->user_id);
    		$sub_array = array();
    		$sub_array[] = $row->id;
    		$sub_array[] = $name[0]['fname']." ".$name[0]['lname'];
    		$sub_array[] = $row->task;
    		$sub_array[] = date("M-d-Y", strtotime($row->date_created));
    		$sub_array[] = '<button type="button" id="'.$row->id.'" class="btn btn-warning btn-xs done">Mark as Done</button>';
    		
    		$data[] = $sub_array;
    	}

    	$output = array(
    		"draw" => intval($_POST["draw"]),
    		"recordsTotal" => $this->staff_task_model->get_all_data(),
    		"recordsfiltered" => $this->staff_task_model->get_filtered_data(),
    		"data"	=> $data
    	);
    	echo json_encode($output);	
    }

    public function assign()
    {
    	$this->user_model->assigntask();
    	$this->session->set_flashdata('success','Task Successfully assigned!');
		redirect('admin/manage_staff');

    }

    public function manage_task()
    {
    	$this->load->model('user/Staff_task_model','staff_task_model');
    	$data['task'] = $this->staff_task_model->get_user(3);
    	$this->load->view('templates/dashboard_header');
    	$this->load->view('admin/staff_task',$data);
    	$this->load->view('templates/dashboard_footer');
    }
    public function markdone()
    {  
        $this->user_model->markdone($_POST["user_id"]);
        $this->session->set_flashdata('success','Task Marked as Done!');
    }

    public function manage_leave()
    {
    	$this->load->view('templates/dashboard_header');
    	$this->load->view('admin/manage_leave');
    	$this->load->view('templates/dashboard_footer');
    }

    public function fetch_leave()
    {  
    	$this->load->model("user/Staff_leave_model","staff_leave_model");
    	$fetch_data = $this->staff_leave_model->make_datatables();
    	$data = array();
    	foreach ($fetch_data as $row) 
    	{
    		$name = $this->staff_leave_model->get_user($row->user_id);
    		$sub_array = array();
    		$sub_array[] = $row->id;
    		$sub_array[] = $name[0]['fname']." ".$name[0]['lname'];
    		$sub_array[] = date("M-d-Y", strtotime($row->date_from));
    		$sub_array[] = date("M-d-Y", strtotime($row->date_to));
    		$sub_array[] = $row->reason;
    		$sub_array[] = '<button type="button" id="'.$row->id.'" class="btn btn-warning btn-xs approve">Approve</button>';
    		
    		$data[] = $sub_array;
    	}

    	$output = array(
    		"draw" => intval($_POST["draw"]),
    		"recordsTotal" => $this->staff_leave_model->get_all_data(),
    		"recordsfiltered" => $this->staff_leave_model->get_filtered_data(),
    		"data"	=> $data
    	);
    	echo json_encode($output);	
    }

    public function approveleave()
    {  
        $this->user_model->markapprove($_POST["user_id"]);
        $this->session->set_flashdata('success','Approved!');
    }

    public function chat()
    {
        $data['users'] = $this->user_model->getalluser();
        $this->load->view('templates/dashboard_header');
        $this->load->view('admin/chat',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function staffchat()
    {
        $data['users'] = $this->user_model->getalluser();
        $this->load->view('templates/staff_header');
        $this->load->view('admin/chat',$data);
        $this->load->view('templates/staff_footer');
    }

    public function calctime($uid)
    {
        $data['staff'] = $this->user_model->getstaff($uid);
        $this->load->view('templates/dashboard_header');
        $this->load->view('admin/timecalc',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function calcstafftime()
    {
        $output = array();    
        $data = $this->user_model->get_staff_time($_POST["id"],$_POST["datefrom"],$_POST["dateto"]);  
        foreach ($data as $row) 
        {
            $stime = new DateTime($row->time_in);
            $etime = new DateTime($row->time_out);
            if($stime > $etime){
                $interval1 = $stime->diff(new DateTime('24:00:00')) ;
                $interval2 = $etime->diff(new DateTime('00:00:00')) ;

                $e = new DateTime('00:00');
                $f = clone $e;
                $e->add($interval1);
                $f->add($interval2);
                $row->total = $f->diff($e)->format("%H.%I");
            }
            else{
                $diff = $stime->diff($etime);
                // $row->total = $diff->format( '%H:%I' )+date('h:ia ', strtotime($row->time_out));
                $row->total = $diff->format( '%H.%I' );
            }
            $row->date = date("M-d-Y", strtotime($row->date));
            $row->time_in = date('h:ia ', strtotime($row->time_in));
            $row->time_out = date('h:ia ', strtotime($row->time_out));
            // $tot = array("total"=>"haha");
            // array_push($row,$tot);
            $sub_array = array();
            $sub_array[] = $row;

            $output[] = $sub_array;
        } 
        echo json_encode($output);
    }
}
