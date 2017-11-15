<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{
    public function index(){
        $data['title'] = 'About';
        
        $this->load->view('template/header',$data);
        $this->load->view('about',$data);
        $this->load->view('template/footer');
    }
}