<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class genre_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_by_genre($genre){
		$this->db->select('*');
		$this->db->from('bookdetail');
		$this->db->like('genre', $genre);
		
		$query = $this->db->get();
		return $query->result_array();
	}
} 