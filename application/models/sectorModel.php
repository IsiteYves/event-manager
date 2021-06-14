<?php
class DistrictModel extends CI_Model
{
	function selectAll()
	{
		$districts = $this->db->get('districts')->result_array();
		return $districts;
	}
}
