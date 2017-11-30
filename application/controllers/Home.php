<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        $data['title'] = 'Home';
        $data['books'] = $this->books_model->get_limit(4);
        $data['log']   = $this->session->flashdata('log')!=NULL?$this->session->flashdata('log'):NULL;
        
        $this->load->view('template/header',$data);
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }
}