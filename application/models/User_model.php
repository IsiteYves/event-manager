<?php
class User_model extends CI_model{
 
  public function login_user($username, $pass){
    //$email,$pass
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('username',$username);
    $this->db->and('password',$pass);
  
    if($query=$this->db->get() && $query->num_rows()>0)
    {
      return $query->result_array();
    }
    else{
      return false;
    }
  }

}
 
 
?>