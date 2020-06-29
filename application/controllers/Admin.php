<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('ams_model');

		
	}
	public function index()
	{
		echo 'admin';
		//$data = array(
		//	'page' => 'login'
		//);
		//$this->load->view('ams/load/load', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
}
