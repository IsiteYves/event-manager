<?php
class User_model extends CI_model{
 
  public function login_user($username, $pass){
    //$email,$pass
    $this->db->where('user_name',$username);
    $password = hash('SHA512', $pass);
    $this->db->where('password',$password);
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