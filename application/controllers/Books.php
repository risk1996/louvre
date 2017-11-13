<?php

	class Books extends CI_Controller{
		public function index(){
			$data["books"] = $this->books_model->get_books();

			print_r($data["books"]);
		}

		public function view($slug=NULL){

			$data["book"] = $this->books_model->get_books($slug);

			if(empty($data["book"])){
				show_404();
			}

			print_r($data["book"]);
		}

		public function search($keyword = NULL){

			$data["book"] = $this->books_model->find_book($keyword);

			if(empty($data["book"])){
				$data["book"] = $this->books_model->get_books();
			}

			print_r($data["book"]);
		}

		public function recomended(){
			$data["books"] = $this->books_model->get_recommended();
		}
	} 