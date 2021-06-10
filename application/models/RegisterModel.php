<?php
class RegisterModel extends CI_Model
{
    function insert($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }
    
    function select($userId){
        $this->db->where('userId',$userId);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            $data = $query->fetch();
            return $data;
        }
    }
}