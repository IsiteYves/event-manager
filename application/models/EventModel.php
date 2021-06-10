<?php
class EventModel extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('events', $data);
		return $this->db->insert_id();
	}

	function select()
	{
		$query = $this->db->get('events')->result_array();
		if (count($query) > 0) {
			return $query;
		} else {
			return 'You have no events yet';
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
