<?php 

class Ams_model extends CI_Model{
    public function check_user($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->from('user');
        $cnt = $this->db->count_all_results();
        
        return $cnt;
    }
    public function get_info($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        foreach($query->result() as $row){
            $data = array(
                'username' => $row->username,
                'status' => $row->status,
                'role' => $row->role,
            );    
            $cnt++;
        } 
       $this->session->set_userdata($data);
       
    }
}