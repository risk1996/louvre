<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        $data['title'] = 'Home';
        $data['books'] = $this->books_model->get_limit(4);
        $data['log']   = $this->session->flashdata('log')!=NULL?$this->session->flashdata('log'):NULL;
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]|max_length[30]');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        $this->form_validation->run();

        $this->load->view('template/header',$data);
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }
}