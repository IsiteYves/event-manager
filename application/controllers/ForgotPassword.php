<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('User_model');
	}

	function index()
	{
		$this->load->view('ResetPassword/ForgotPassword');
	}

	function validation()
	{
		$this->form_validation->set_rules('reset_email', 'E-mail', 'valid_email|required|trim');
		$reset_email = $this->input->post('reset_email');
		$vcode = bin2hex(random_bytes(6));
		if ($this->form_validation->run()) {
			$res = $this->User_model->selectWhere($reset_email);
			if ($res === 'found') {
				$subject = "Password Reset Code";
				$message = "<p>Here is your password reset code</p><h3>$vcode</h3>";
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'qwertygroup0@gmail.com',
					'smtp_pass' => '*qwerty1.1',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1'
				);
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from('qwertygroup0@gmail.com');
				$this->email->to($reset_email);
				$this->email->subject($subject);
				$this->email->message($message);

				if ($this->email->send()) {
					$this->session->set_flashdata('email', $reset_email);
					$this->session->set_flashdata('v_code', $vcode);
				} else {
					$err = $this->email->print_debugger();
					$this->session->set_flashdata('email', $err);
				}
				$this->User_model->updateVCodeWhere($reset_email, $vcode);
				redirect('/providecode');
			}
		} else {
			$this->index();
		}
	}
}
