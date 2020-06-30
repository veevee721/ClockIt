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
			'name' => $this->hr_model->get_name($this->session->userdata('username'))
			
		);
		$this->load->view('hr/load/load', $data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
