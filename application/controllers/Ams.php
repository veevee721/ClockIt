<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ams extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ams_model');
		$role = $this->session->userdata('role');
		$office = $this->session->userdata('office');
		if(!empty($role)){
			if($role == 1){
				redirect('admin');
			}elseif($role == 2 && $office == 1){
				redirect('hr');
			}elseif($role == 4 && $office == 1){
				redirect('hr');
			}elseif($role == 5 && $office == 1){
				redirect('hr');
			}elseif($role == 3){
				redirect('sds');
			}elseif($role == 4){
				redirect('office_admin');
			}else{
				redirect('member');
			}
		}
	}
	public function index()
	{
		$data = array(
			'page' => 'login'
		);
		$this->load->view('ams/load/load', $data);
	}
	public function ams(){
		$data = array(
			'member' => '',
      		'status' => 'a'
		);
		$this->load->view('ams/ams', $data);
	}
	public function process_ams(){
		date_default_timezone_set('Asia/Manila');
		$chk_member = $this->ams_model->check_member($this->input->post('plantilla'));
		if($chk_member == 1){
		  $chk_time = $this->ams_model->check_time_diff($this->input->post('plantilla'), date('Y-m-d'), date("H:i:s"));
		  if($chk_time >= 5){
			$status = $this->ams_model->check_in_out($this->input->post('plantilla'), date('Y-m-d'));
			$data = array(
			  'plantilla' => $this->input->post('plantilla'),
			  'status' => $status,
			  'time' => date("H:i:s"),
			  'date' => date('Y-m-d')
			);
			$this->ams_model->process_ams($data, $this->input->post('plantilla'), $status);
			if($status == 0){
			  $data = array(
				'page' => 'ams',
				'member' => $this->ams_model->get_member($this->input->post('plantilla')),
				'status' => $status+2
			  );
			}else{
			  $data = array(
				'page' => 'ams',
				'member' => $this->ams_model->get_member($this->input->post('plantilla')),
				'status' => $status
			  );
			}
			$this->load->view('ams/ams', $data);
		  }else{
			$data = array(
			  'page' => 'ams',
			  'member' => '',
			  'status' => 'b'
			);
			$this->load->view('ams/ams', $data);
		  }
		}else{
		  $data = array(
			'page' => 'ams',
			'member' => '',
			'status' => 'c'
		  );
		  $this->load->view('ams/ams', $data);
		}
	}
	public function process_login(){
		$chk = $this->ams_model->check_user($this->input->post('username'), md5($this->input->post('password')));
		if($chk == 1){
			$this->ams_model->get_info($this->input->post('username'), md5($this->input->post('password')));
			redirect('ams');
		}else{
			$data = array(
				'page' => 'login',
				'message' => 'User Not Found'
			);
			$this->load->view('ams/load/load', $data);
		}
	}
}
