<?php
class UserModel extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	function select($userId)
	{
		$this->db->where('userId', $userId);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			return $data;
		}
	}

	function login($username, $pass)
	{
		$this->db->where('user_name', $username);
		$this->db->where('password', $pass);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	function fetchAllUsers($limit, $start)
	{

		$this->db->select('userId,first_name,last_name,email,user_name,count(created_by) as events,created_by');
		$this->db->from('users');
		$this->db->join('events', 'users.userId = events.created_by', 'left');
		$this->db->limit($limit);
		$this->db->Offset($start);

		$this->db->group_by('userId,first_name,last_name,email,user_name,created_by');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function fetchUsers()
	{
		$this->db->select('userId,first_name,last_name,email,user_name,count(created_by) as events,created_by');
		$this->db->from('users');
		$this->db->join('events', 'users.userId = events.created_by', 'left');
		$this->db->group_by('userId,first_name,last_name,email,user_name,created_by');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function getTotalUsers()
	{
		return $this->db->count_all('users');
	}

	function deleteUser($id)
	{
		$this->db->where('userId', $id);
		$this->db->delete('users');
	}

	function userProfile($id)
	{
		$this->db->where('userId', $id);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function update($id, $data)
	{
		$this->db->where('userId', $id);
		$this->db->update('users', $data);
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
