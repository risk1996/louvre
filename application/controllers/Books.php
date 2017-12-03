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

	public function new(){

		$crud = new grocery_CRUD();
		$crud->set_table('book');
		$output = $crud->render();

		//$this->load->view('template/header',$data);
        $this->load->view('booknew',$output);
        //$this->load->view('template/footer',$data);
	}

	public function addcategory(){
		$crud = new grocery_CRUD();
		$crud->set_table('bookgenre');
		$output = $crud->render();

		//$this->load->view('template/header',$data);
        $this->load->view('booknew',$output);
        //$this->load->view('template/footer',$data);
	}
} 