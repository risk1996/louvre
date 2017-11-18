<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genre extends CI_Controller{

	public function get_by_category($category){
		$data["books"] = $this->genre_model->get_by_category($category);
		
	}
}