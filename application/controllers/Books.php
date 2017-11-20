<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
	public function index(){
		$criteria = array();
		$filters = array('isbn13', 'title', 'author', 'price', 'pages', 'lang', 'format');
		foreach($filters as $filter)if($this->input->post($filter) !== NULL){
			$criteria[$filter] = $this->input->post($filter);
		}
		if($this->input->post('searchby') !== NULL){
			$criteria[$this->input->post('searchby')] = $this->input->post('keyword');
		}
		$data['books'] = $this->books_model->find_book($criteria);
		$data['langs'] = $this->books_model->get_column('lang');
		$data['formats'] = $this->books_model->get_column('format');
		$data['criteria'] = $criteria;
		$data['title'] = 'Books Catalog';
		
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}

	public function view($slug=NULL){
		$data['book'] = $this->books_model->get_books($slug);
		if(empty($data['book']))show_404();
		$data['title'] = $data['book']['title'].' Info';

		$this->load->view('template/header',$data);
        $this->load->view('book',$data);
        $this->load->view('template/footer');
	}

	public function recomended(){
		$data['books'] = $this->books_model->get_recommended();
		$data['title'] = 'Recommended Books Catalog';
		
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
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