<?php 

class Office_admin_model extends CI_Model{
    public function get_name($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('staff');
        $name = '';
        foreach($query->result() as $row){
            $name = $row->lname.', '.$row->fname;
        }
        
        return $name;
    }
    public function get_members(){
        $this->db->join('user', 'user.username = staff.plantilla');
        $this->db->join('office', 'office.id = staff.assignment');
        $this->db->join('position', 'position.id = staff.position');
        $this->db->select('user.role as role, staff.id as id, staff.plantilla as plantilla, staff.prefix as prefix, staff.fname as fname, staff.mname as mname, staff.lname as lname, staff.extension as extension, staff.suffix as suffix, staff.bdate as bdate, staff.gender as gender, position.position as position, office.abbr as office, staff.status as status, staff.date_added as date_added, staff.date_modified as date_modified');
        $this->db->where('staff.assignment', $this->session->userdata('office'));
        $query = $this->db->get('staff');

        return $query->result();
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
    public function get_ams_search($plantilla,$to,$from){
        $this->db->where('plantilla', $plantilla);
        $this->db->where('date >=', $from);
        $this->db->where('date <=', $to);
        $query = $this->db->get('ams');

        return $query->result();
    }
    public function get_request($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('request');

        return $query->result();
    }
    public function get_my_profile($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('staff');

        return $query->result();
    }
    public function get_positions(){
        $this->db->where('status', 1);
        $query = $this->db->get('position');

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
    public function update_profile($id, $data){
        $this->db->where('id', $id);
        $this->db->update('staff', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Updated Personal Profile',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_member($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('staff');
        $name = '';
        foreach($query->result() as $row){
            $name = $row->fname.' '.$row->mname.' '.$row->lname.', '. $row->extension.' '.$row->suffix;
        }
        return $name;
    }
    public function process_insert_ams($data){
        $this->db->insert('ams', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Added AMS Record for Officemate',
        );
        $this->db->insert('audit', $data1);
    }
    public function get_report($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('mov');

        return $query->result();
    }
    public function insert_mov($data){
        $this->db->insert('mov', $data);
        $data1 = array(
            'user' => $this->session->userdata('username'),
            'action' => 'Filed a Report',
        );
        $this->db->insert('audit', $data1);
    }
}