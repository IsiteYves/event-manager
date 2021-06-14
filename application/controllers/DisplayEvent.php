<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DisplayEvent extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EventModel');
		$this->load->model('UserModel');
		$this->load->model('RolesModel');
		if (!$this->session->userdata('userId')) {
			redirect(base_url() . "login");
		}
	}

	function index()
	{
		$data['data'] = $this->EventModel->select();
		$roleId = $this->session->userdata('roleId');
		$role = $this->RolesModel->selectRole((int)$roleId);
		$data['role_info'] = [$roleId, $role];
		$this->session->set_userdata('role', $role);
		$data['user_info'] = $this->UserModel->select($this->session->userdata('userId'));
		$this->load->view('welcome_message', $data);
	}

	function Logout()
	{
		$data = $this->session->all_userdata();

		foreach ($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
		session_unset();
		session_destroy();
		redirect(base_url() . "login");
	}

	function event()
	{
		$id = $this->input->get('id');
		$data['data'] = $this->EventModel->selectOneEvent($id);
		$this->load->view('events-page/view_event', $data);
	}
}
