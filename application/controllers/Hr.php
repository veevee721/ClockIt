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
			'positions' => $this->hr_model->get_position_to_edit($this->uri->segment(3))
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
	public function logout(){
		$this->session->sess_destroy();
		redirect('ams');
	}
	
}
