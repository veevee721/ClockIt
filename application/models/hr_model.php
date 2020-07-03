<?php 

class Hr_model extends CI_Model{
    public function count_staff(){
        $this->db->from('staff');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_members(){
        $this->db->where('assignment', 1);
        $this->db->from('staff');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_offices(){
        $this->db->from('office');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function count_heads(){
        $this->db->from('user');
        $this->db->where('role', 2);
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
    public function get_name($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('staff');
        $name = '';
        foreach($query->result() as $row){
            $name = $row->lname.', '.$row->fname;
        }
        
        return $name;
    }
    public function get_positions(){
        $this->db->where('status', 1);
        $query = $this->db->get('position');

        return $query->result();
    }
    public function check_position($position){
        $this->db->where('position', $position);
        $this->db->from('position');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function add_position($data){
        $this->db->insert('position', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Created a Position Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function archive_position($id, $data){
        $this->db->where('id', $id);
        $this->db->update('position', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Archived a Position Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_archived_positions(){
        $this->db->where('status', 0);
        $query = $this->db->get('position');

        return $query->result();
    }
    public function restore_position($id, $data){
        $this->db->where('id', $id);
        $this->db->update('position', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Restored a Position Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_position_to_edit($id){
        $this->db->where('id', $id);
        $query = $this->db->get('position');

        return $query->result();
    }
    public function update_position($id, $data){
        $this->db->where('id', $id);
        $this->db->update('position', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Updated a Position Option',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_employee(){
        $this->db->join('office', 'office.id = staff.assignment');
        $this->db->join('position', 'position.id = staff.position');
        $this->db->select('staff.id as id, staff.plantilla as plantilla, staff.prefix as prefix, staff.fname as fname, staff.mname as mname, staff.lname as lname, staff.extension as extension, staff.suffix as suffix, staff.bdate as bdate, staff.gender as gender, position.position as position, office.abbr as office, staff.status as status, staff.date_added as date_added, staff.date_modified as date_modified');
        $this->db->where('staff.status !=', 0);
        $query = $this->db->get('staff');
        
        return $query->result();
    }
    public function get_office(){
        $this->db->where('status', 1);
        $query = $this->db->get('office');

        return $query->result();
    }
    public function get_role(){
        $this->db->where('id !=', 1);
        $query = $this->db->get('role');

        return $query->result();
    }
    public function check_employee($plantilla){
        $this->db->where('plantilla', $plantilla);
        $this->db->from('staff');
        $cnt = $this->db->count_all_results();

        return $cnt;
    }
    public function add_employee($user, $staff){
        $this->db->insert('user', $user);
        $this->db->insert('staff', $staff);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Added an Employee',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_archived_employee(){
        $this->db->join('office', 'office.id = staff.assignment');
        $this->db->join('position', 'position.id = staff.position');
        $this->db->select('staff.id as id, staff.plantilla as plantilla, staff.prefix as prefix, staff.fname as fname, staff.mname as mname, staff.lname as lname, staff.extension as extension, staff.suffix as suffix, staff.bdate as bdate, staff.gender as gender, position.position as position, office.abbr as office, staff.status as status, staff.date_added as date_added, staff.date_modified as date_modified');
        $this->db->where('staff.status', 0);
        $query = $this->db->get('staff');
        
        return $query->result();
    }
    public function archive_employee($plantilla, $data){
        $this->db->where('plantilla', $plantilla);
        $this->db->update('staff', $data);
        $this->db->where('username', $plantilla);
        $this->db->update('user', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Archived an Employee',
        );
        $this->db->insert('audit', $data1);
    }
    public function restore_employee($plantilla, $data){
        $this->db->where('plantilla', $plantilla);
        $this->db->update('staff', $data);
        $this->db->where('username', $plantilla);
        $this->db->update('user', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Restored an Employee',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_profile($plantilla){
        $this->db->join('office', 'office.id = staff.assignment');
        $this->db->join('position', 'position.id = staff.position');
        $this->db->select('staff.id as id, staff.plantilla as plantilla, staff.prefix as prefix, staff.fname as fname, staff.mname as mname, staff.lname as lname, staff.extension as extension, staff.suffix as suffix, staff.bdate as bdate, staff.gender as gender, position.position as position, office.office as office, staff.status as status, staff.date_added as date_added, staff.date_modified as date_modified');
        $this->db->where('staff.plantilla', $plantilla);
        $query = $this->db->get('staff');
        
        return $query->result();
    }
    public function get_ams($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('ams');

        return $query->result();
    }
    public function get_request($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('request');

        return $query->result();
    }
    public function get_requests(){
        $this->db->join('staff', 'staff.plantilla = request.plantilla');
        $this->db->select('request.id as id, staff.plantilla as plantilla, staff.prefix as prefix, staff.fname as fname, staff.mname as mname, staff.lname as lname, staff.extension as extension, staff.suffix as suffix, request.request as request, request.date_start as date_start, request.date_end as date_end, request.date_added as date_added, request.status as status');
        $query = $this->db->get('request');

        return $query->result();
    }
    public function approve_request($id, $data){
        $this->db->where('id', $id);
        $this->db->update('request', $data);
        $this->db->where('id', $id);
        $query = $this->db->get('request');
        $plantilla = '';
        foreach($query->result() as $row){
            $plantilla = $row->plantilla;
        }
        $data2 = array(
            'status' => 4
        );
        $this->db->where('plantilla', $plantilla);
        $this->db->update('staff', $data2);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Approved Leave Request',
        );
        $this->db->insert('audit', $data1);
    }
    public function deny_request($id, $data){
        $this->db->where('id', $id);
        $this->db->update('request', $data);
        $this->db->where('id', $id);
        $query = $this->db->get('request');
        $plantilla = '';
        foreach($query->result() as $row){
            $plantilla = $row->plantilla;
        }
        $data2 = array(
            'status' => 1
        );
        $this->db->where('plantilla', $plantilla);
        $this->db->update('staff', $data2);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Denied Leave Request',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_members(){
        $this->db->join('office', 'office.id = staff.assignment');
        $this->db->join('position', 'position.id = staff.position');
        $this->db->select('staff.id as id, staff.plantilla as plantilla, staff.prefix as prefix, staff.fname as fname, staff.mname as mname, staff.lname as lname, staff.extension as extension, staff.suffix as suffix, staff.bdate as bdate, staff.gender as gender, position.position as position, office.office as office, staff.status as status, staff.date_added as date_added, staff.date_modified as date_modified');
        $this->db->where('staff.assignment', $this->session->userdata('office'));
        $query = $this->db->get('staff');

        return $query->result();
    }
    public function count_office(){
        $query = $this->db->get('office');
        $data = '[';
        foreach($query->result() as $row){
            $this->db->where('office', $row->id);
            $this->db->from('user');
            $cnt = $this->db->count_all_results();
            $data .= "{ office: '".$row->abbr."', count : '".$cnt."' }, ";
        }
        $data .= ']';

        return $data;
    }
    public function get_my_profile($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('staff');

        return $query->result();
    }
    public function update_profile($id, $data){
        $this->db->where('id', $id);
        $this->db->update('staff', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Updated Personal Profile',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_my_request($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('request');

        return $query->result();
    }
    public function get_leave_type(){
        $query = $this->db->get('leave_type');

        return $query->result();
    }
    public function add_leave($data){
        $this->db->insert('request', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Filed Request for Leave',
        );
        $this->db->insert('audit', $data1);
    }
}