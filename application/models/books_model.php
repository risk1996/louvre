<?php

	class books_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}

		/*
		Fetch whole books or a book with a specified slug
		@param $slug string
		@return result array or single row array
		*/
		public function get_books($slug = FALSE){
			
			if(!$slug){
				$query = $this->db->get('book');
				return $query->result_array();
			}else{
				$query = $this->db->get_where('book',array('slug'=>$slug));
				return $query->row_array();
			}
		}

		/*
		find book with matching a string on it's title
		@param $keyword string
		@return result array
		*/
		public function find_book($keyword = FALSE){

			if(!$keyword){
				return FALSE;
			}else{
				$this->db->like('title',$keyword);
				$query = $this->db->get('book');
				return $query->result_array();
			}
		}

		/*
		get recommended books
		@return result array
		*/
		public function get_recommended(){
			$query = $this->db->get('bookfeatured');
			return $query->result_array();
		}
	}