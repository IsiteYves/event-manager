<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProvideCode extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('ResetPassword/ProvideCode');
	}

	function validation()
	{
		$this->form_validation->set_rules('prov_code', 'Reset-Code', 'required|trim');
		$reset_email = $this->input->post('email');
		$v_code = $this->UserModel->selectVCodeWhere($reset_email);
		$prov_code = $this->input->post('prov_code');
		$this->session->set_flashdata('email', $reset_email);
		if ($this->form_validation->run()) {
			if ($v_code !== $prov_code) {
				$this->session->set_flashdata('vcode_error', "Incorrect code. Please try again.");
				redirect('providecode');
			} else {
				$data['data'] = "$reset_email";
				$this->load->view('ResetPassword/ResetPassword', $reset_email);
			}
		} else {
			$this->index();
		}
	}
}
