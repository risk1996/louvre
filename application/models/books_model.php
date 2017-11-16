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
			$this->db->select('book.isbn13, title, slug, price, stock, summary, edition, pages, pubdate, author, language, format, GROUP_CONCAT(genre) as genre');
			$this->db->from('book');
			$this->db->join('bookgenre', 'book.isbn13 = bookgenre.isbn13');
			$this->db->group_by('1');
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->select('book.isbn13, title, slug, price, stock, summary, edition, pages, pubdate, author, language, format, GROUP_CONCAT(genre) as genre');
			$this->db->from('book');
			$this->db->where(array('slug' => $slug));
			$this->db->join('bookgenre', 'book.isbn13 = bookgenre.isbn13');
			$this->db->group_by('1');
			$query = $this->db->get();
			return $query->row_array();
		}
	}

	public function get_limit($limit = FALSE, $start = FALSE){
		$this->db->select('book.isbn13, title, slug, price, stock, summary, edition, pages, pubdate, author, language, format, GROUP_CONCAT(genre) as genre');
		$this->db->from('book');
		$this->db->join('bookgenre', 'book.isbn13 = bookgenre.isbn13');
		$this->db->group_by('1');
		if($limit && $start)$this->db->limit($limit, $start);
		else if($limit)$this->db->limit($limit);
		$query = $this->db->get();
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
			$this->db->select('book.isbn13, title, slug, price, stock, summary, edition, pages, pubdate, author, language, format, GROUP_CONCAT(genre) as genre');
			$this->db->from('book');
			foreach($criteria as $key => $keyword){
				// if($key)$this->db->like($key, '%'.$keyword.'%');
			}
			$this->db->join('bookgenre', 'book.isbn13 = bookgenre.isbn13');
			$this->db->group_by('1');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	/*
	get recommended books
	@return result array
	*/
	public function get_recommended(){
		$this->db->select('book.isbn13, title, slug, price, stock, summary, edition, pages, pubdate, author, language, format, GROUP_CONCAT(genre) as genre, info, until');
		$this->db->from('bookfeatured');
		$this->db->join('book', 'bookfeatured.isbn13 = book.isbn13');
		$this->db->join('bookgenre', 'bookfeatured.isbn13 = bookgenre.isbn13');
		$this->db->group_by('1');
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function add($data = NULL){
	// 	if(isset($data))return FALSE;
	// 	else{
	// 		$this->db->insert();
	// 	}
	// }

	public function edit($data = NULL){
		if()
	}
}