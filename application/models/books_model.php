<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class books_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*
	Fetch whole books or a book with a specified slug
	@param $slug string
	@return result array or single row array
	*/
	public function get_books($slug = FALSE){
		if(!$slug){
			$query = $this->db->get('bookdetail');
			return $query->result_array();
		}else{
			$query = $this->db->get('bookdetail', array('slug' => $slug));
			return $query->row_array();
		}
	}

	public function get_limit($limit = FALSE, $start = FALSE){
		if($limit && $start)$this->db->limit($limit, $start);
		else if($limit)$this->db->limit($limit);
		$query = $this->db->get('bookdetail');
		return $query->result_array();
	}
	/*
	find book with matching a string on it's title
	@param $keyword string
	@return result array
	*/
	public function find_book($criteria){
		if(!$keyword){
			return FALSE;
		}else{
			$this->db->from('bookdetail');
			foreach($criteria as $key => $val){
				if($key == 'isbn13' || $key == 'title' || $key == 'author' || $key == 'summary' || $key == 'genre'){
					$keyword = explode(' ', $val);
					$this->db->like($key, '%'.$keyword.'%');
				}
				else if($key == 'price' || $key == 'stock' || $key == 'pages'){
					$min = explode(',', $val)[0];
					$max = explode(',', $val)[1];
					$this->db->where($key.' BETWEEN '.$min.' AND '. $max);
				}
				else if($key == 'language' || $key == 'format'){
					$this->db->where($key.' = '.$val);
				}
			}
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	/*
	get recommended books
	@return result array
	*/
	public function get_recommended(){
		$query = $this->db->get('bookrecommended');
		return $query->result_array();
	}

	// public function add($data = NULL){
	// 	if(isset($data))return FALSE;
	// 	else{
	// 		$this->db->insert();
	// 	}
	// }

	// public function edit($data = NULL){
	// 	if()
	// }
}