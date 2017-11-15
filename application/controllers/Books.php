<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
	public function index(){
		$data["books"] = $this->books_model->get_books();
		$data['title'] = 'Books Catalog';
		
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}

	public function view($slug=NULL){
		$data["book"] = $this->books_model->get_books($slug);
		if(empty($data["book"]))show_404();
		$data['title'] = $data['book']['title'].' Info';

		$this->load->view('template/header',$data);
        $this->load->view('book',$data);
        $this->load->view('template/footer');
	}

	public function search($keyword = NULL){
		$data["books"] = $this->books_model->find_book($keyword);
		if(empty($data["books"]))$data["books"] = $this->books_model->get_books();
		$data['title'] = 'Books Catalog';

		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}

	public function recomended(){
		$data["books"] = $this->books_model->get_recommended();
		$data['title'] = 'Recommended Books Catalog';
		
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}
} 