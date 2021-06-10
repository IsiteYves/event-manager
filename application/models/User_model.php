<?php
class User_model extends CI_model{
 
  public function login_user($username, $pass){
    //$email,$pass
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
 
 
?>