<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class DisplayUsers extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('fpdf/fpdf');
        $this->load->library('pagination');
        if(!$this->session->userdata('userId')){
            redirect(base_url().'login');
        }
    }
    
    function index(){

        $data = array();
        
        $start= ($this->uri->segment(2)) ? ($this->uri->segment(2)-1) : 0;
        $limit = 1;
        $config['base_url'] = base_url().'users';
        $config['total_rows'] = $this->UserModel->getTotalUsers();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;

        //////////////////////////////
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<button class="btn btn-light border-success mr-5" style="margin-right:1%">';
		$config['first_tag_close'] = '</button>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<button class="btn btn-light border-success mr-5" style="margin-right:1%">';
		$config['last_tag_close'] = '</button>';
		
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<button class="btn btn-light border-success mr-5" style="margin-right:1%">';
		$config['next_tag_close'] = '</button>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<button class="btn btn-light border-success mr-5" style="margin-right:1%">';
		$config['prev_tag_close'] = '</button>';

		$config['cur_tag_open'] = '<button class="btn btn-success mr-5" style="margin-right:1%">';
		$config['cur_tag_close'] = '</button>';

		$config['num_tag_open'] = '<button class="btn btn-light border-success" style="margin-right:1%">';
		$config['num_tag_close'] = '</button>';

		/////////////////////////////////////

        $this->pagination->initialize($config);

        $data['data'] = $this->UserModel->fetchAllUsers($limit,$start);
        $data['links'] = $this->pagination->create_links();
        
        $data['user_info'] = $this->UserModel->select($this->session->userdata('userId'));
        $this->load->view('users-page/displayUsers',$data);
    }

    function pdfExport(){
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10,'User Id',1,0);
        $pdf->Cell(25,10,'Firstname',1,0);
        $pdf->Cell(25,10,'Lastname',1,0);
        $pdf->Cell(70,10,'Email',1,0);
        $pdf->Cell(30,10,'Username',1,0);
        $pdf->Ln();
        $data = $this->UserModel->fetchUsers();
        $pdf->SetFont('Arial','',12);
        foreach($data as $user){
            $pdf->Cell(30,10,$user['userId'],1,0);
            $pdf->Cell(25,10,$user['first_name'],1,0);
            $pdf->Cell(25,10,$user['last_name'],1,0);
            $pdf->Cell(70,10,$user['email'],1,0);
            $pdf->Cell(30,10,$user['user_name'],1,0);
            $pdf->Ln();
        }
        $pdf->Output('Users in the database','I');
    }
}