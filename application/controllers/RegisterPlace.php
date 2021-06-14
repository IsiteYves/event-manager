<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterPlace extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('PlaceModel');
        $this->load->model('UserModel');
    }

    function index(){
        if($this->session->userdata("userId") == NULL){
            redirect('login');
        } else {
            $data['user_info'] = $this->UserModel->select($this->session->userdata('userId'));
            $this->load->view('places-page/createPlace',$data);
        }
    }

    function validation(){
        $config['allowed_types'] = 'jpg|png|gif';
        $config['upload_path'] = './place_images_uploads/';
        $config['encrypt_name'] = true;

        $this->load->library('upload',$config);

        $this->form_validation->set_rules('place_name','Place Name','required|trim');
        $this->form_validation->set_rules('place_description','Place Description','required|trim');

        if($this->form_validation->run()){
            if($this->upload->do_upload('place_image')){
                $image_name = $this->upload->data();
                $data = array(
                    'place_name' => $this->input->post('place_name'),
                    'place_description' => $this->input->post('place_description'),
                    'place_image' => $image_name['file_name'],
                    'created_by' => $this->session->userdata('userId')
                ); 
                $id = $this->PlaceModel->insert($data);
                if($id > 0){
                    redirect(''.base_url());
                }       
            }
            else{
                $this->session->set_flashdata('message',$this->upload->display_errors());
                redirect(base_url().'places/new');
            }
            
        }
        else{
            $this->index();
        }
    }
}