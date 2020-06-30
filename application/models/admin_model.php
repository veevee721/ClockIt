<?php 

class Admin_model extends CI_Model{
    public function count_users(){
        $this->db->from('user');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_admins(){
        $this->db->where('role', 1);
        $this->db->from('user');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_offices(){
        $this->db->from('office');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_audits(){
        $this->db->from('audit');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_logs(){
        $this->db->from('ams');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_reports(){
        $this->db->from('mov');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function get_admin(){
        $this->db->where('role', 1);
        $this->db->where('status', 1);
		$query = $this->db->get('user');

		return $query->result();
    }
    public function check_account($username){
        $this->db->where('username', $username);
        $this->db->from('user');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function add_admin($data){
        $this->db->insert('user', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Created an Administrator Account',
        );
        $this->db->insert('audit', $data1);
    }
    public function archive_user($id, $data){
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Archived an Administrator Account',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_archived_admin(){
        $this->db->where('role', 1);
        $this->db->where('status', 0);
		$query = $this->db->get('user');

		return $query->result();
    }
    public function restore_user($id, $data){
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Restored an Administrator Account',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_office(){
        $this->db->where('status', 1);
        $query = $this->db->get('office');
        
        return $query->result();
    }
    public function check_office($office){
        $this->db->where('office', $office);
        $this->db->from('office');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function add_office($data){
        $this->db->insert('office', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Created an Office Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function archive_office($id, $data){
        $this->db->where('id', $id);
        $this->db->update('office', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Archived an Office Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_archived_office(){
        $this->db->where('status', 0);
        $query = $this->db->get('office');
        
        return $query->result();
    }
    public function restore_office($id, $data){
        $this->db->where('id', $id);
        $this->db->update('office', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Restored an Office Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_office_to_edit($id){
        $this->db->where('id', $id);
        $query = $this->db->get('office');

        return $query->result();
    }
    public function update_office($id, $data){
        $this->db->where('id', $id);
        $this->db->update('office', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Updated an Office Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_audit(){
        $query = $this->db->get('audit');

        return $query->result();
    }
    public function get_roles(){
        $query = $this->db->get('role');

        return $query->result();
    }
    public function count_roles($role){
        $this->db->where('role', $role);
        $this->db->from('user');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
}