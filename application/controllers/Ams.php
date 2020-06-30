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
