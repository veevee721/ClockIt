<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('hr_model');
		$office = $this->session->userdata('office');
		if($office != 1){
			redirect('ams');
		}
		
	}
	public function index()
	{
		$data = array(
			'page' => 'dashboard',
			'staffs' => $this->hr_model->count_staff(),
			'members' => $this->hr_model->count_members(),
			'offices' => $this->hr_model->count_offices(),
			'heads' => $this->hr_model->count_heads(),
			'logs' => $this->hr_model->count_logs(),
			'reports' => $this->hr_model->count_reports(),
			'name' => $this->hr_model->get_name($this->session->userdata('username')),
			'office' => $this->hr_model->count_office(),
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function position(){
		$data = array(
			'page' => 'position',
			'positions' => $this->hr_model->get_positions(),
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function process_add_position(){
		$chk = $this->hr_model->check_position(strtoupper($this->input->post('position')));
		if($chk == 1){
			$data = array(
				'page' => 'position',
				'positions' => $this->hr_model->get_positions(),
				'name' => $this->hr_model->get_name(strtoupper($this->input->post('position'))),
				'type' => 'danger',
				'message' => 'Position Already Created!'
				
			);
			$this->load->view('hr/load/load', $data);
		}else{
			$data1 = array(
				'position' => strtoupper($this->input->post('position')),
				'status' => 1,
				'date_added' => date('Y-m-d')
			);
			$this->hr_model->add_position($data1);
			$data = array(
				'page' => 'position',
				'positions' => $this->hr_model->get_positions(),
				'name' => $this->hr_model->get_name(strtoupper($this->input->post('position'))),
				'type' => 'success',
				'message' => 'Position Successfully Created!'
				
			);
			$this->load->view('hr/load/load', $data);
		}
	}
	public function archive_position(){
		$data1 = array(
			'status' => 0
		);
		$this->hr_model->archive_position($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'position',
			'positions' => $this->hr_model->get_positions(),
			'name' => $this->hr_model->get_name(strtoupper($this->input->post('position'))),
			'type' => 'warning',
			'message' => 'Position Successfully Archived!'
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function archived_position(){
		$data = array(
			'page' => 'archived_position',
			'positions' => $this->hr_model->get_archived_positions(),
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function restore_position(){
		$data1 = array(
			'status' => 1
		);
		$this->hr_model->restore_position($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'position',
			'positions' => $this->hr_model->get_positions(),
			'name' => $this->hr_model->get_name(strtoupper($this->input->post('position'))),
			'type' => 'success',
			'message' => 'Position Successfully Restored!'
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function edit_position(){
		$data = array(
			'page' => 'edit_position',
			'positions' => $this->hr_model->get_position_to_edit($this->uri->segment(3)),
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
		);
		$this->load->view('hr/load/load', $data);
	}
	public function process_edit_position(){
		$chk = $this->hr_model->check_position(strtoupper($this->input->post('position')));
		if($chk == 1){
			redirect('hr/edit_position/'.$this->input->post('id').'/1');
		}else{
			$data1 = array(
				'position' => strtoupper($this->input->post('position')),
				
			);
			$this->hr_model->update_position($this->input->post('id'), $data1);
			$data = array(
				'page' => 'position',
				'positions' => $this->hr_model->get_positions(),
				'name' => $this->hr_model->get_name(strtoupper($this->input->post('position'))),
				'type' => 'success',
				'message' => 'Position Successfully Edited!'
				
			);
			$this->load->view('hr/load/load', $data);
		}
	}
	public function employee(){
		$data = array(
			'page' => 'employee',
			'employee' => $this->hr_model->get_employee(),
			'position' => $this->hr_model->get_positions(),
			'office' => $this->hr_model->get_office(),
			'role' => $this->hr_model->get_role(),
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function process_add_employee(){
		$chk = $this->hr_model->check_employee($this->input->post('plantilla'));
		if($chk == 1){
			$data = array(
				'page' => 'employee',
				'employee' => $this->hr_model->get_employee(),
				'position' => $this->hr_model->get_positions(),
				'office' => $this->hr_model->get_office(),
				'role' => $this->hr_model->get_role(),
				'type' => 'warning',
				'message' => 'Employee Already Encoded!',
				'name' => $this->hr_model->get_name($this->session->userdata('username'))
				
			);
			$this->load->view('hr/load/load', $data);
		}else{
			$data1 = array(
				'username' => $this->input->post('plantilla'),
				'password' => md5($this->input->post('plantilla')),
				'date_added' => date('Y-m-d'),
				'role' => $this->input->post('role'),
				'office' => $this->input->post('assignment'),
				'status' => 1
			);
			$data2 = array(
				'plantilla' => $this->input->post('plantilla'),
				'prefix' => $this->input->post('prefix'),
				'fname' => strtoupper($this->input->post('fname')),
				'mname' => strtoupper($this->input->post('mname')),
				'lname' => strtoupper($this->input->post('lname')),
				'extension' => strtoupper($this->input->post('extension')),
				'suffix' => strtoupper($this->input->post('suffix')),
				'bdate' => $this->input->post('bdate'),
				'gender' => $this->input->post('gender'),
				'assignment' => $this->input->post('assignment'),
				'position' => $this->input->post('position'),
				'status' => 1,
				'date_added' => date('Y-m-d')
			);
			$this->hr_model->add_employee($data1, $data2);
			$data = array(
				'page' => 'employee',
				'employee' => $this->hr_model->get_employee(),
				'position' => $this->hr_model->get_positions(),
				'office' => $this->hr_model->get_office(),
				'role' => $this->hr_model->get_role(),
				'type' => 'success',
				'message' => 'Employee Added Successfully!',
				'name' => $this->hr_model->get_name($this->session->userdata('username'))
				
			);
			$this->load->view('hr/load/load', $data);
		}
	}
	public function archived_employee(){
		$data = array(
			'page' => 'archived_employee',
			'employee' => $this->hr_model->get_archived_employee(),
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function archive_profile(){
		$data1 = array(
			'status' => 0
		);
		$this->hr_model->archive_employee($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'employee',
			'employee' => $this->hr_model->get_employee(),
			'position' => $this->hr_model->get_positions(),
			'office' => $this->hr_model->get_office(),
			'role' => $this->hr_model->get_role(),
			'type' => 'warning',
			'message' => 'Employee Archived Successfully!',
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function restore_profile(){
		$data1 = array(
			'status' => 1
		);
		$this->hr_model->restore_employee($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'employee',
			'employee' => $this->hr_model->get_employee(),
			'position' => $this->hr_model->get_positions(),
			'office' => $this->hr_model->get_office(),
			'role' => $this->hr_model->get_role(),
			'type' => 'success',
			'message' => 'Employee Restored Successfully!',
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
		);
		$this->load->view('hr/load/load', $data);
	}
	public function view_profile(){
		$data = array(
			'page' => 'profile',
			'name' => $this->hr_model->get_name($this->session->userdata('username')),
			'profile' => $this->hr_model->get_profile($this->uri->segment(3)),
			'ams' => $this->hr_model->get_ams($this->uri->segment(3)),
			'request' => $this->hr_model->get_request($this->uri->segment(3)),
		);
		$this->load->view('hr/load/load', $data);
	}
	public function request(){
		$data = array(
			'page' => 'request_leave',
			'name' => $this->hr_model->get_name($this->session->userdata('username')),
			'requests' => $this->hr_model->get_requests(),
		);
		$this->load->view('hr/load/load', $data);
	}
	public function approve_request(){
		$data1 = array(
			'status' => 1
		);
		$this->hr_model->approve_request($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'request_leave',
			'name' => $this->hr_model->get_name($this->session->userdata('username')),
			'requests' => $this->hr_model->get_requests(),
			'type' => 'success',
			'message' => 'Request for Leave Approved'
		);
		$this->load->view('hr/load/load', $data);
	}
	public function deny_request(){
		$data1 = array(
			'status' => 2
		);
		$this->hr_model->deny_request($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'request_leave',
			'name' => $this->hr_model->get_name($this->session->userdata('username')),
			'requests' => $this->hr_model->get_requests(),
			'type' => 'warning',
			'message' => 'Request for Leave Denied'
		);
		$this->load->view('hr/load/load', $data);
	}
	public function members(){
		$data = array(
			'page' => 'members',
			'name' => $this->hr_model->get_name($this->session->userdata('username')),
			'members' => $this->hr_model->get_members(),
		);
		$this->load->view('hr/load/load', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
