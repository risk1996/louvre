<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	
	public function get_books($slug = FALSE){
		$this->db->order_by('adddate DESC');
		if(!$slug){
			$query = $this->db->get('bookdetail');
			return $query->result_array();
		}else{
			$query = $this->db->get_where('bookdetail', array('slug' => $slug));
			return $query->row_array();
		}
	}

	public function get_latest($limit = FALSE, $start = FALSE){
		if($limit && $start)$this->db->limit($limit, $start);
		else if($limit)$this->db->limit($limit);
		$this->db->order_by('adddate DESC');
		$query = $this->db->get('bookdetail');
		return $query->result_array();
	}

	public function get_special($featured){
		$this->db->where('featured', $featured);
		$query = $this->db->get('bookdetail');
		return $query->result_array();
	}
	
	public function find_book($criteria){
		if(!$criteria){
			return $this->books_model->get_books(FALSE);
		}else{
			$this->db->from('bookdetail');
			foreach($criteria as $key => $val){
				if($key == 'isbn13' || $key == 'title' || $key == 'author'){
					$keywords = explode(' ', $val);
					foreach($keywords as $keyword)$this->db->like($key, $keyword);
				}
				else if($key == 'genre'){
					$keywords = explode(',', $val);
					foreach($keywords as $keyword)$this->db->where('genre LIKE BINARY', '%'.$keyword.'%');
				}
				else if($key == 'price' || $key == 'stock' || $key == 'pages'){
					$min = explode(',', $val)[0];
					$max = explode(',', $val)[1];
					if($key=='price')$key='discountedprice';
					$this->db->where($key.' >= '.$min);
					$this->db->where($key.' <= '.$max);
				}
				else if($key == 'lang' || $key == 'format'){
					$this->db->like($key, $val);
				}
				else if($key == 'discount'){
					if($val=='TRUE')$this->db->where('featured', 'FALSE');
					else if($val=='FALSE') $this->db->where('featured = TRUE OR featured IS NULL');
				}
			}
			$this->db->order_by('adddate DESC');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_recommended(){
		$query = $this->db->get('bookrecommended');
		return $query->result_array();
	}

	public function get_column($col){
		$this->db->distinct();
		$this->db->select($col);
		$this->db->from('bookdetail');
		$query = $this->db->get();
		$raws = $query->result_array();
		$res = array();
		foreach($raws as $raw)array_push($res, $raw[$col]);
		return $res;
	}

	public function get_genres(){
		$this->db->distinct();
		$this->db->select('genre');
		$this->db->from('bookgenre');
		$this->db->order_by('1');
		$query = $this->db->get();
		$raws = $query->result_array();
		$res = array();
		foreach($raws as $raw)array_push($res, $raw['genre']);
		return $res;
	}

	public function get_datum($isbn13, $col){
		$this->db->select($col);
		$query = $this->db->get_where('bookdetail', array('isbn13' => $isbn13));
		return $query->row_array()[0];
	}

	public function get_users_books($email){
		$this->db->from('userbook');
		$this->db->where('email',$email);
		$res = $this->db->get();
		return $res->result_array();
	}

	public function get_table($table){
		$query = $this->db->get($table);
		return $query->result_array();
	}
}