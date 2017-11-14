<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
	public function index(){
		$data["books"] = $this->books_model->get_books();
		print_r($data["books"]);
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}

	public function view($slug=NULL){
		$data["book"] = $this->books_model->get_books($slug);
		if(empty($data["book"])){
			show_404();
		}
		$this->load->view('template/header',$data);
        $this->load->view('book',$data);
        $this->load->view('template/footer');
	}

	public function search($keyword = NULL){
		$data["book"] = $this->books_model->find_book($keyword);
		if(empty($data["book"])){
			$data["book"] = $this->books_model->get_books();
		}
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}

	public function recomended(){
		$data["books"] = $this->books_model->get_recommended();
		$this->load->view('template/header',$data);
        $this->load->view('catalog',$data);
        $this->load->view('template/footer');
	}
} 