<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResetPassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EventModel');
	}

	function index()
	{
		$data['data'] = $this->EventModel->select();
		$this->load->view('ResetPassword/ResetPassword', $data);
	}
}
