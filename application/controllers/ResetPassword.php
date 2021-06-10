<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResetPassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data['data'] = '';
		$this->load->view('ResetPassword/ResetPassword', $data);
	}

	function validation()
	{
		$this->form_validation->set_rules('new_password', 'New password', 'required|trim|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('confirmed_new_password', 'Confirmed new password', 'required|trim|min_length[6]|max_length[20]');
		$new_password = $this->input->post('new_password');
		$c_new_password = $this->input->post('confirmed_new_password');
		$email = $this->input->post('email');
		if ($this->form_validation->run()) {
			if ($new_password !== $c_new_password) {
				$this->session->set_flashdata('email', $email);
				$this->session->set_flashdata('passwords_error', 'Please confirm your new password correctly');
				redirect('resetpassword');
			} else {
				$new_password = hash("SHA256", $new_password);
				$this->User_model->updatePasswordWhere($email, $new_password);
				redirect('/login');
			}
		}else{
			$this->index();
		}
	}
}
