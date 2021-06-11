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
		$this->db->select('event_id, event_name, event_description, event_duration, event_image, user_name');
		$this->db->from('events');
        $this->db->join('users', 'users.userId = events.created_by');

		$query = $this->db->get()->result_array();
		
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
