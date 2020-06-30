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
}