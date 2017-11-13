<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        $data['title'] = 'Home';

        $this->load->view('template/header',$data);
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }
}