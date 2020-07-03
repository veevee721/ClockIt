<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sds extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('sds_model');
		$role = $this->session->userdata('role');
		if($role != 3){
			redirect('ams');
		}
		
	}
	public function index()
	{
		$data = array(
			'page' => 'members',
			'name' => $this->sds_model->get_name($this->session->userdata('username')),
			'members' => $this->sds_model->get_members(),
			
			
		);
		$this->load->view('sds/load/load', $data);
	}
	public function file_request(){
		$data = array(
			'page' => 'file_request',
			'name' => $this->sds_model->get_name($this->session->userdata('username')),
			'request' => $this->sds_model->get_my_request($this->session->userdata('username')),
			'leave_type' => $this->sds_model->get_leave_type()
			
		);
		$this->load->view('sds/load/load', $data);
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
		$this->sds_model->add_leave($data1);
		$data = array(
			'page' => 'file_request',
			'name' => $this->sds_model->get_name($this->session->userdata('username')),
			'request' => $this->sds_model->get_my_request($this->session->userdata('username')),
			'leave_type' => $this->sds_model->get_leave_type(),
			'type' => 'success',
			'message' => 'Filed a Request for Leave'
			
		);
		$this->load->view('sds/load/load', $data);
	}
	public function view_profile(){
		$data = array(
			'page' => 'profile',
			'name' => $this->sds_model->get_name($this->session->userdata('username')),
			'profile' => $this->sds_model->get_profile($this->uri->segment(3)),
			'ams' => $this->sds_model->get_ams($this->uri->segment(3)),
			'request' => $this->sds_model->get_request($this->uri->segment(3)),
		);
		$this->load->view('sds/load/load', $data);
	}
	public function update_profile(){
		$data = array(
			'page' => 'update_profile',
			'name' => $this->sds_model->get_name($this->session->userdata('username')),
			'profile' => $this->sds_model->get_my_profile($this->session->userdata('username')),
			'position' => $this->sds_model->get_positions(),
			'office' => $this->sds_model->get_office(),
			'role' => $this->sds_model->get_role(),
		);
		$this->load->view('sds/load/load', $data);
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
		$this->sds_model->update_profile($this->input->post('id'), $data1);
		redirect('sds/view_profile/'.$this->session->userdata('username'));
	}
	public function update_image(){
		$data = array(
			'page' => 'update_image',
			'name' => $this->sds_model->get_name($this->session->userdata('username')),
			'profile' => $this->sds_model->get_my_profile($this->session->userdata('username')),
			
		);
		$this->load->view('sds/load/load', $data);
	}
	public function process_update_image(){
		$config['upload_path'] = './img/profile/'; 
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size'] = '3000';
		$config['overwrite'] = true;
		$config['file_name'] = $this->input->post('plantilla');
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		redirect('sds/view_profile/'.$this->session->userdata('username'));
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
