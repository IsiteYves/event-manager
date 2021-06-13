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

    function fetchAllUsers($limit,$start){

      $this->db->select('userId,first_name,last_name,email,user_name,count(created_by) as events,created_by');
	  	$this->db->from('users');
      $this->db->join('events', 'users.userId = events.created_by','left');
      $this->db->limit($limit);
      $this->db->Offset($start);

      $this->db->group_by('userId,first_name,last_name,email,user_name,created_by');

      $query=$this->db->get();

      if($query->num_rows() > 0){
        return $query->result_array();
      }  
    }
    
    function fetchUsers(){
      $this->db->select('userId,first_name,last_name,email,user_name,count(created_by) as events,created_by');
	  	$this->db->from('users');
      $this->db->join('events', 'users.userId = events.created_by','left');
      $this->db->group_by('userId,first_name,last_name,email,user_name,created_by');
      $query=$this->db->get();

      if($query->num_rows() > 0){
        return $query->result_array();
      }  
    }

    function getTotalUsers(){
      return $this->db->count_all('users');
    }

    function deleteUser($id){
        $this->db->where('userId',$id);
        $this->db->delete('users');
    }
    
}