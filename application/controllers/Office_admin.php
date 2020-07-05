<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('office_admin_model');
		$role = $this->session->userdata('role');
		$office = $this->session->userdata('office');
		if($role != 4 && $office == 1){
			redirect('ams');
		}
		
	}
	public function index()
	{
		$data = array(
			'page' => 'members',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'members' => $this->office_admin_model->get_members(),
			
			
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function process_daily(){
		if($this->input->post('from') <= $this->input->post('to')){
			$data = array(
				'page' => 'members',
				'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
				'members' => $this->office_admin_model->get_members(),
				'ams' => $this->office_admin_model->get_ams_search($this->input->post('plantilla'), $this->input->post('to'), $this->input->post('from')),
				'member' => $this->office_admin_model->get_member($this->input->post('plantilla')),
				'to' => $this->input->post('to'),
				'from' => $this->input->post('from'),
				
			);
			$this->load->view('office_admin/load/load', $data);
		}else{
			$data = array(
				'page' => 'members',
				'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
				'members' => $this->office_admin_model->get_members(),
				'message' => 'Error on Search Dates',
				'type' => 'alert alert-danger' 
			);
			$this->load->view('office_admin/load/load', $data);
		}
		
	}
	public function file_request(){
		$data = array(
			'page' => 'file_request',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'request' => $this->office_admin_model->get_my_request($this->session->userdata('username')),
			'leave_type' => $this->office_admin_model->get_leave_type()
			
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function process_add_leave(){
		$data1 = array(
			'plantilla' => $this->session->userdata('username'),
			'request' => $this->input->post('request'),
			'date_start' => $this->input->post('date_start'),
			'date_end' => $this->input->post('date_end'),
			'status' => 0,
			'date_added' => date('Y-m-d')
		);
		$this->office_admin_model->add_leave($data1);
		$data = array(
			'page' => 'file_request',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'request' => $this->office_admin_model->get_my_request($this->session->userdata('username')),
			'leave_type' => $this->office_admin_model->get_leave_type(),
			'type' => 'success',
			'message' => 'Filed a Request for Leave'
			
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function view_profile(){
		$data = array(
			'page' => 'profile',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'profile' => $this->office_admin_model->get_profile($this->uri->segment(3)),
			'ams' => $this->office_admin_model->get_ams($this->uri->segment(3)),
			'request' => $this->office_admin_model->get_request($this->uri->segment(3)),
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function update_profile(){
		$data = array(
			'page' => 'update_profile',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'profile' => $this->office_admin_model->get_my_profile($this->session->userdata('username')),
			'position' => $this->office_admin_model->get_positions(),
			'office' => $this->office_admin_model->get_office(),
			'role' => $this->office_admin_model->get_role(),
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function process_update_profile(){
		$data1 = array(
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
		);
		$this->office_admin_model->update_profile($this->input->post('id'), $data1);
		redirect('office_admin/view_profile/'.$this->session->userdata('username'));
	}
	public function update_image(){
		$data = array(
			'page' => 'update_image',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'profile' => $this->office_admin_model->get_my_profile($this->session->userdata('username')),
			
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function process_update_image(){
		$config['upload_path'] = './img/profile/'; 
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size'] = '3000';
		$config['overwrite'] = true;
		$config['file_name'] = $this->input->post('plantilla');
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		redirect('office_admin/view_profile/'.$this->session->userdata('username'));
	}
	public function records(){
		$data = array(
			'page' => 'records',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'members' => $this->office_admin_model->get_members(),
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function process_insert_ams(){
		$data1 = array(
			'plantilla' => $this->input->post('plantilla'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'status' => $this->input->post('status'),
			'remarks' => $this->input->post('remarks')
		);
		$this->office_admin_model->process_insert_ams($data1);
		$data = array(
			'page' => 'records',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'members' => $this->office_admin_model->get_members(),
			'type' => 'success',
			'message' => 'Successfully Added An AMS Record for '.$this->input->post('plantilla')
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function reports(){
		$data = array(
			'page' => 'movs',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'members' => $this->office_admin_model->get_members(),
			'report' => $this->office_admin_model->get_report($this->session->userdata('username'))
			
			
		);
		$this->load->view('office_admin/load/load', $data);
	}
	public function process_insert_mov(){
		$data = array(
			'plantilla' => $this->session->userdata('username'),
			'report' => $this->input->post('report'),
			'date_added' => date('Y-m-d')
		);
		$this->member_model->insert_mov($data);
		$data = array(
			'page' => 'movs',
			'name' => $this->office_admin_model->get_name($this->session->userdata('username')),
			'members' => $this->office_admin_model->get_members(),
			'report' => $this->office_admin_model->get_report($this->session->userdata('username')),
			'type' => 'success',
			'message' => 'Successfully Filed a Report'
			
			
		);
		$this->load->view('office_admin/load/load', $data);
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
