<?php
class UserModel extends CI_Model
{
    function insert($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }
    
    function select($userId){
        $this->db->where('userId',$userId);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            $data = $query->result_array();
            return $data;
        }
    }

    function login($username, $pass){
        $this->db->where('user_name',$username);
        $this->db->where('password',$pass);
        $query=$this->db->get('users');
        if($query->num_rows()>0)
        {
          return $query->result_array();
        }
        else{
          return false;
        }
      }
    
}