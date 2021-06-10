<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('EventModel');
	}

	function index()
	{
		$this->load->view('ResetPassword/ForgotPassword');
	}

	function validation()
	{
		$this->form_validation->set_rules('reset_email', 'E-mail', 'valid_email|required|trim');

		if ($this->form_validation->run()) {
			$res = $this->EventModel->selectWhere($this->input->post('reset_email'));
			if ($res === 'found') {
				$subject = "Password Reset Code";
				$v_code = "123456";
				$message = "<p>Here is your password reset code</p><h3>$v_code</h3>";
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtpout.secureserver.net',
					'smtp_port' => 80,
					'stmp_user' => 'Yves ISITE',
					'smtp_pass' => 'gloysyevp/c**proG7',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('yvesisite@gmail.com');

				redirect('ProvideCode');
			}
		} else {
			$this->index();
		}
	}
}
