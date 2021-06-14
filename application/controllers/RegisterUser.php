<?php
class RegisterUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
	}
	function index()
	{
		$this->load->view('registerUser');
	}

	function validation()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('user_name', 'Username', 'required|trim|is_unique[users.user_name]');
		$this->form_validation->set_rules('user_email', 'Email', 'required|trim|is_unique[users.email]');
		$this->form_validation->set_rules('user_role', 'Role', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');


		if ($this->form_validation->run()) {
			$encrypted = hash('sha256', $this->input->post('password'));
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'user_name' => $this->input->post('user_name'),
				'email' => $this->input->post('user_email'),
				'roleId' => $this->input->post('user_role'),
				'password' => $encrypted
			);

			$id = $this->UserModel->insert($data);
			if ($id > 0) {
				$this->session->set_userdata('userId', $id);
				redirect("");
			}
		} else {
			$this->index();
		}
	}
}
