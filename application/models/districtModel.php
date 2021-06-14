<?php
class DistrictModel extends CI_Model
{
	function selectAll()
	{
		$districts = $this->db->get('districts')->result_array();
		return $districts;
	}

	function getSpecificDistricts($sectorId) {
		$this->db->where('sectorId', $sectorId);
		$q1 = $this->db->get('sectors')->result_array();
		$districtId = $q1[0]['districtId'];
		$districts = $this->db->get('districts')->result_array();
		$whole_result = "";
		foreach($districts as $district) {
			if($district['districtId'] == $districtId) {
				$whole_result .= "<option value=\"".$district['sectorId']."\" selected>".$district['sectorName']."</option>";
			}else{
				$whole_result .= "<option value=\"".$district['sectorId']."\">".$district['sectorName']."</option>";
			}
		}
		return $whole_result;
	}
}
