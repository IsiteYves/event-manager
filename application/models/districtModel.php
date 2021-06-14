<?php
class SectorModel extends CI_Model
{
	function selectAll()
	{
		$sectors = $this->db->get('sectors')->result_array();
		return $sectors;
	}
}
