<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
	public function index($slug=NULL){
		$data['book'] = $this->books_model->get_books($slug);
		if(empty($data['book']))show_404();
		$data['title'] = $data['book']['title'].' Info';

		$this->load->view('template/header',$data);
        $this->load->view('book',$data);
        $this->load->view('template/footer');
	}

	public function new(){
		$data['title'] = 'Add New Book';

		$this->form_validation->set_rules('isbn13', 'ISBN13', '');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_rules('price', 'Price', '');
		$this->form_validation->set_rules('stock', 'Stock', '');
		$this->form_validation->set_rules('edition', 'Edition', '');
		$this->form_validation->set_rules('pages', 'Pages', '');
		$this->form_validation->set_rules('pubdate', 'Publication Date', '');
		$this->form_validation->set_rules('author', 'Author', '');
		$this->form_validation->set_rules('language', 'Language', '');
		$this->form_validation->set_rules('format', 'Format', '');

		$this->load->view('template/header',$data);
        $this->load->view('booknew',$data);
        $this->load->view('template/footer');
	}

	public function edit(){
		$data['title'] = 'Edit Book';

		$this->load->view('template/header',$data);
        $this->load->view('bookedit',$data);
        $this->load->view('template/footer');
	}
} 