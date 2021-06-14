<?php
class SectorModel extends CI_Model
{
	function selectAll()
	{
		$sectors = $this->db->get('sectors')->result_array();
		return $sectors;
	}

	function getSpecificSectors($districtId) {
		$this->db->where('districtId', $districtId);
		$this->db->order_by('sectorName');
		$matching_sectors = $this->db->get('sectors')->result_array();
		$whole_result = "";
		foreach($matching_sectors as $sector) {
			$whole_result .= "<option value=\"".$sector['sectorId']."\">".$sector['sectorName']."</option>";
		}
		return $whole_result;
	}
}
