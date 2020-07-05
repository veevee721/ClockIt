<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Head extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('head_model');
		$role = $this->session->userdata('role');
		$office = $this->session->userdata('office');
		if($role != 2 && $office == 1){
			redirect('ams');
		}
		
	}
	public function index()
	{
		$data = array(
			'page' => 'members',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'members' => $this->head_model->get_members(),
			
			
		);
		$this->load->view('head/load/load', $data);
	}
	public function file_request(){
		$data = array(
			'page' => 'file_request',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'request' => $this->head_model->get_my_request($this->session->userdata('username')),
			'leave_type' => $this->head_model->get_leave_type()
			
		);
		$this->load->view('head/load/load', $data);
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
		$this->head_model->add_leave($data1);
		$data = array(
			'page' => 'file_request',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'request' => $this->head_model->get_my_request($this->session->userdata('username')),
			'leave_type' => $this->head_model->get_leave_type(),
			'type' => 'success',
			'message' => 'Filed a Request for Leave'
			
		);
		$this->load->view('head/load/load', $data);
	}
	public function view_profile(){
		$data = array(
			'page' => 'profile',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'profile' => $this->head_model->get_profile($this->uri->segment(3)),
			'ams' => $this->head_model->get_ams($this->uri->segment(3)),
			'request' => $this->head_model->get_request($this->uri->segment(3)),
		);
		$this->load->view('head/load/load', $data);
	}
	public function update_profile(){
		$data = array(
			'page' => 'update_profile',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'profile' => $this->head_model->get_my_profile($this->session->userdata('username')),
			'position' => $this->head_model->get_positions(),
			'office' => $this->head_model->get_office(),
			'role' => $this->head_model->get_role(),
		);
		$this->load->view('head/load/load', $data);
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
		$this->head_model->update_profile($this->input->post('id'), $data1);
		redirect('head/view_profile/'.$this->session->userdata('username'));
	}
	public function update_image(){
		$data = array(
			'page' => 'update_image',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'profile' => $this->head_model->get_my_profile($this->session->userdata('username')),
			
		);
		$this->load->view('head/load/load', $data);
	}
	public function process_update_image(){
		$config['upload_path'] = './img/profile/'; 
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size'] = '3000';
		$config['overwrite'] = true;
		$config['file_name'] = $this->input->post('plantilla');
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		redirect('head/view_profile/'.$this->session->userdata('username'));
	}
	public function assign_employee(){
		$data = array(
			'role' => 4
		);
		$this->head_model->assign_employee($this->uri->segment(3), $data);
		redirect('head');
	}
	public function unassign_employee(){
		$data = array(
			'role' => 5
		);
		$this->head_model->assign_employee($this->uri->segment(3), $data);
		redirect('head');
	}
	public function reports(){
		$data = array(
			'page' => 'movs',
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'members' => $this->head_model->get_members(),
			'report' => $this->head_model->get_report($this->session->userdata('username'))
			
			
		);
		$this->load->view('head/load/load', $data);
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
			'name' => $this->head_model->get_name($this->session->userdata('username')),
			'members' => $this->head_model->get_members(),
			'report' => $this->head_model->get_report($this->session->userdata('username')),
			'type' => 'success',
			'message' => 'Successfully Filed a Report'
			
			
		);
		$this->load->view('head/load/load', $data);
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
