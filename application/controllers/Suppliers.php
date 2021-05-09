<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('supplier_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
	}
	public function index()
	{
		$data['suppliers'] = $this->supplier_model->getall();
		$this->template->load('template','suppliers/index', $data);
	}

	public function add()
	{
		$post = $this->input->post(null, TRUE);
		$this->supplier_model->add($post);
		$this->session->set_flashdata('message','Data berhasil di Tambah..!');
		$this->session->set_flashdata('check',1);
		redirect('suppliers/');
	}

	public function edit()
	{
		$post = $this->input->post(null, TRUE);
		$this->supplier_model->edit($post);
		$this->session->set_flashdata('message','Data berhasil di Edit..!');
		$this->session->set_flashdata('check',2);
		redirect('suppliers/');
	}
	public function del()
	{
		$id = $this->input->post('id');
		$this->supplier_model->del($id);
		$this->session->set_flashdata('message','Data berhasil di Hapus..!');
		$this->session->set_flashdata('check',3);
		redirect('suppliers');
	}

}
