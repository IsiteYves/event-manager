<?php
class PlaceModel extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('places', $data);
		return $this->db->insert_id();
	}

	function select()
	{
		$this->db->select('place_id, place_name, place_description, place_image, location, user_name');
		$this->db->from('places');
        $this->db->join('users', 'users.userId = places.created_by');

		$query = $this->db->get()->result_array();
		
		if (count($query) > 0) {
			return $query;
		} else {
			return 'You have not shared any places yet';
		}
	}

	function selectOnePlace($id){
		$this->db->where('place_id',$id);
		$query = $this->db->get('places')->result_array();
		if (count($query) > 0) {
			return $query;
		} else {
			return 'Unable to find the place';
		}
	}

	function selectWhere($email)
	{
		$found = true;
		if ($found) : return "found";
		else : return "notfound";
		endif;
	}
}
