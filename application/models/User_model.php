<?php
class User_model extends CI_model
{

	public function login_user($username, $pass)
	{
		//$email,$pass
		$this->db->where('user_name', $username);
		$password = hash('SHA512', $pass);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	function selectWhere($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users')->result_array();
		if (count($query) > 0) {
			return "found";
		} else {
			return 'notfound';
		}
	}

	function updateVCodeWhere($email, $vcode)
	{
		$this->db->set('vcode', "$vcode");
		$this->db->where('email', $email);
		$this->db->update('users');
	}

	function selectVCodeWhere($email)
	{
		$this->db->where('email', $email);
		$res_arr = $this->db->get('users')->result_array();
		$vcode = $res_arr[0]['vcode'];
		return $vcode;
	}

	function updatePasswordWhere($email, $new_password)
	{
		$this->db->set('password', $new_password);
		$this->db->where('email', $email);
		$this->db->update('users');
	}
}
