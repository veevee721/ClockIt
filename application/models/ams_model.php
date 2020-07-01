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
                'office' => $row->office
            );    
            
        } 
       $this->session->set_userdata($data);
       
    }
    public function check_member($plantilla){
        $this->db->where('plantilla', $plantilla);
        $cnt = $this->db->count_all_results('staff');

        return $cnt;
    }
    public function check_time_diff($plantilla, $date, $time){
        $this->db->where('plantilla', $plantilla);
        $this->db->where('date', $date);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('ams');
        $timedb = 0;
        $diff = 0;
        if(empty($query->result())){
            return 5;
        }else{
            foreach($query->result() as $row){
                $timedb = $row->time;
            }
            $diff = round(abs(strtotime($time)-strtotime($timedb)) / 60,2);
            return $diff;
        }
    }
    public function check_in_out($plantilla, $date){
        $this->db->where('plantilla', $plantilla);
        $this->db->where('date', $date);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('ams');

        $status = 0;

        if(empty($query->result())){
            return 1;
        }else{
            foreach($query->result() as $row){
                $status = $row->status;
            }
            if($status == 1){
                return 0;
            }else{
                return 1;
            }
        }
    }
    public function process_ams($data, $plantilla, $status){
        $this->db->insert('ams', $data);
        $this->db->where('plantilla', $plantilla);
        if($status == 0){
            $data1 = array(
                'status' => 3,
            );
        }else{
            $data1 = array(
                'status' => 2,
            );
        }
        $this->db->update('staff', $data1);
    }
    public function get_member($plantilla){
        $this->db->where('plantilla', $plantilla);
        $query = $this->db->get('staff');

        return $query->result();
    }
    
}