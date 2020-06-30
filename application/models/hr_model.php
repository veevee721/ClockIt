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
}