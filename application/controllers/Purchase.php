<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller{
    public function cart(){
        $data['title'] = 'Your Cart';

        $this->load->view('template/header',$data);
        $this->load->view('cart',$data);
        $this->load->view('template/footer');
    }
}