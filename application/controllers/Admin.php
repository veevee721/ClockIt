<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$role = $this->session->userdata('role');
		if($role != 1){
			redirect('ams');
		}
		
	}
	public function index()
	{
		$data = array(
			'page' => 'dashboard',
			'users' => $this->admin_model->count_users(),
			'admins' => $this->admin_model->count_admins(),
			'offices' => $this->admin_model->count_offices(),
			'audits' => $this->admin_model->count_audits(),
			'logs' => $this->admin_model->count_logs(),
			'reports' => $this->admin_model->count_reports()
		);
		$this->load->view('admin/load/load', $data);
	}
	public function administrator(){
		$data = array(
			'page' => 'admin',
			'admins' => $this->admin_model->get_admin()
		);
		$this->load->view('admin/load/load', $data);
	}
	public function process_add_admin(){
		$chk = $this->admin_model->check_account($this->input->post('username'));
		if($chk == 1){
			$data = array(
				'page' => 'admin',
				'admins' => $this->admin_model->get_admin(),
				'type' => 'danger',
				'message' => 'Username Already Used!'
			);
			$this->load->view('admin/load/load', $data);
		}else{
			$data1 = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('username')),
				'role' => 1,
				'status' => 1,
				'date_added' => date('Y-m-d')
			);
			$this->admin_model->add_admin($data1);
			$data = array(
				'page' => 'admin',
				'admins' => $this->admin_model->get_admin(),
				'type' => 'success',
				'message' => 'Admininstrator Account Successfully Created!'
			);
			$this->load->view('admin/load/load', $data);
		}
	}
	public function archive_user(){
		$data1 = array(
			'status' => 0
		);
		$this->admin_model->archive_user($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'admin',
			'admins' => $this->admin_model->get_admin(),
			'type' => 'warning',
			'message' => 'Admininstrator Account Successfully Archived!'
		);
		$this->load->view('admin/load/load', $data);
	}
	public function archived_administrator(){
		$data = array(
			'page' => 'archived_administrator',
			'admins' => $this->admin_model->get_archived_admin()
		);
		$this->load->view('admin/load/load', $data);
	}
	public function restore_user(){
		$data1 = array(
			'status' => 1
		);
		$this->admin_model->restore_user($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'admin',
			'admins' => $this->admin_model->get_admin(),
			'type' => 'success',
			'message' => 'Admininstrator Account Successfully Restored!'
		);
		$this->load->view('admin/load/load', $data);
	}
	public function office(){
		$data = array(
			'page' => 'office',
			'offices' => $this->admin_model->get_office()
		);
		$this->load->view('admin/load/load', $data);
	}
	public function process_add_office(){
		$chk = $this->admin_model->check_office(strtoupper($this->input->post('office')));
		if($chk == 1){
			$data = array(
				'page' => 'office',
				'offices' => $this->admin_model->get_office(),
				'type' => 'danger',
				'message' => 'Office Option Already Available!'
			);
			$this->load->view('admin/load/load', $data);
		}else{
			$data1 = array(
				'office' => strtoupper($this->input->post('office')),
				'status' => 1,
				'date_added' => date('Y-m-d')
			);
			$this->admin_model->add_office($data1);
			$data = array(
				'page' => 'office',
				'offices' => $this->admin_model->get_office(),
				'type' => 'success',
				'message' => 'Office Option Successfully Added!'
			);
			$this->load->view('admin/load/load', $data);
		}
	}
	public function archive_office(){
		$data1 = array(
			'status' => 0
		);
		$this->admin_model->archive_office($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'office',
			'offices' => $this->admin_model->get_office(),
			'type' => 'warning',
			'message' => 'Office Option Successfully Archived!'
		);
		$this->load->view('admin/load/load', $data);
	}
	public function archived_office(){
		$data = array(
			'page' => 'archived_office',
			'offices' => $this->admin_model->get_archived_office()
		);
		$this->load->view('admin/load/load', $data);
	}
	public function restore_office(){
		$data1 = array(
			'status' => 1
		);
		$this->admin_model->restore_office($this->uri->segment(3), $data1);
		$data = array(
			'page' => 'office',
			'offices' => $this->admin_model->get_office(),
			'type' => 'success',
			'message' => 'Office Option Successfully Restored!'
		);
		$this->load->view('admin/load/load', $data);
	}
	public function edit_office(){
		$data = array(
			'page' => 'edit_office',
			'offices' => $this->admin_model->get_office_to_edit($this->uri->segment(3))
		);
		$this->load->view('admin/load/load', $data);
	}
	public function process_edit_office(){
		$chk = $this->admin_model->check_office(strtoupper($this->input->post('office')));
		if($chk == 1){
			redirect('admin/edit_office/'.$this->input->post('id').'/1');
		}else{
			$data1 = array(
				'office' => strtoupper($this->input->post('office')),
				
			);
			$this->admin_model->update_office($this->input->post('id'), $data1);
			$data = array(
				'page' => 'office',
				'offices' => $this->admin_model->get_office(),
				'type' => 'success',
				'message' => 'Office Option Successfully Editted!'
			);
			$this->load->view('admin/load/load', $data);
		}
	}
	public function audit(){
		$data = array(
			'page' => 'audit',
			'audits' => $this->admin_model->get_audit(),
			
		);
		$this->load->view('admin/load/load', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
