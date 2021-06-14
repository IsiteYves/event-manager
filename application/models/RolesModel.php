<?php
class RolesModel extends CI_Model
{
	function selectRole($roleId)
	{
		$this->db->where('roleId', 3);
		$roleArr = $this->db->get('roles')->result_array();
		return $roleArr[0]['role'];
	}
}
