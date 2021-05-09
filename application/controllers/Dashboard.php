<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('user_model');

	}

	public function index()
	{
		$data = array(
			'products' 	=> $this->db->from('products')->get()->num_rows(),
			'suppliers' => $this->db->from('suppliers')->get()->num_rows(),
			'pembeli' 	=> $this->db->from('pembeli')->get()->num_rows(),
		);
		
		$this->template->load('template','dashboard', $data);
	}


}
