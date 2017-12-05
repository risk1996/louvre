<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
	public function index($slug=NULL){
		$data['book'] = $this->books_model->get_books($slug);
		if(empty($data['book']))show_404();
		$data['title'] = $data['book']['title'].' Info';

		$this->load->view('template/header',$data);
        $this->load->view('book',$data);
        $this->load->view('template/footer',$data);
	}

	public function slug($str){
		return url_title(strtolower($str));
	}
} 