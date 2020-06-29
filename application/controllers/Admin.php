<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('ams_model');

		
	}
	public function index()
	{
		$data = array(
			'page' => 'dashboard'
		);
		$this->load->view('admin/load/load', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
}
