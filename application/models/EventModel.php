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

	function selectOneEvent($id){
		$this->db->where('event_id',$id);
		$query = $this->db->get('events')->result_array();
		if (count($query) > 0) {
			return $query;
		} else {
			return 'Unable to find the event';
		}
	}

	function selectWhere($email)
	{
		$found = true;
		if ($found) : return "found";
		else : return "notfound";
		endif;
	}

	function inviteToEvent($event,$user){
		$this->db->where('event_id',$event);
		$query = $this->db->get('events');
		if($query->num_rows() == 0){
            return 'Unable to find the event';
		}
		else{
			$data = array(
				'event_id'=>$event,
				'user_id'=>$user
			);
			if($this->db->insert('event_members',$data)){
				return 'Member added successfully';
			}
			else{
				return 'Member failed to be added';
			}
		}
	}
}
