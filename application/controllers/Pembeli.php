<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('pembeli_model');
		$this->load->library('session');

	}
	public function index()
	{
		$data['pembeli'] = $this->pembeli_model->getall();
		$this->template->load('template','pembeli/index', $data);
	}
	public function add()
	{
		$post = $this->input->post();
		$this->pembeli_model->add($post);
		$this->session->set_flashdata('message','data berhasil di Tambah..!');
		$this->session->set_flashdata('check','1');
		redirect('pembeli/');
	}
	public function edit()
	{
		$post = $this->input->post();
		$this->pembeli_model->edit($post);
		$this->session->set_flashdata('message','data berhasil di Edit..!');
		$this->session->set_flashdata('check','2');
		redirect('pembeli/');
	}
	public function del()
	{
		
		$id = $this->input->post('id_pembeli');
		$this->pembeli_model->del($id);
		$this->session->set_flashdata('message','data berhassil di Hapus..!');
		$this->session->set_flashdata('check','3');
		redirect('pembeli/');
	}


}
