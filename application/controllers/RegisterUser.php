<?php
class RegisterUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
		$this->load->model('DistrictModel');
		$this->load->model('SectorModel');
		$this->load->helper('url');
	}
	function index()
	{
		$data['districts'] = $this->DistrictModel->selectAll();
		$data['sectors'] = $this->SectorModel->selectAll();
		$this->load->view('registerUser', $data);
	}

	function getCorrSectors()
	{
		// POST data
		$distr_Id = $_GET['distr_id']; 

		// get data
		$data = $this->SectorModel->getSpecificSectors($distr_Id);

		echo $data;
	}

	function getCorrDistricts()
	{
		// POST data
		$distr_Id = $_GET['distr_id']; 

		// get data
		$data = $this->DistrictModel->getSpecificDistricts($distr_Id);

		echo $data;
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
