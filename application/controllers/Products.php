<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('product_model');
		$this->load->model('supplier_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$data['products'] = $this->product_model->join();
		$data['suppliers'] = $this->supplier_model->getall();
		$this->template->load('template','products/index',$data );
	}

	public function add()
	{
		$post = $this->input->post(null, TRUE);
		if(!empty($_FILES['gambar']['name'])) {

			$config['file_name'] = 'gambar-'.rand(0,100).rand(0,100).'-'.date('ymds');
			$config['upload_path'] = './upload/products';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2048;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('gambar')) {
				$file = $this->upload->data();
				$gambar = $file['file_name'];
				$this->product_model->add($post, $gambar);
				$this->session->set_flashdata('message','Data berhasil di Tambah..!');
				$this->session->set_flashdata('check',1);
				redirect('products/');
			} 
			else {
				$this->session->set_flashdata('message','Gagal menambah data & upload gambar..!');
				$this->session->set_flashdata('check',3);
				redirect('products/');
			}
		}else{
			$gambar = "default.jpg";
			$this->product_model->add($post, $gambar);
			$this->session->set_flashdata('message','Data berhasil di Tambah..!');
			$this->session->set_flashdata('check',1);
			redirect('products/');
		}

	}

	public function edit()
	{
		$post = $this->input->post();
		if(!empty($_FILES['gambar']['name'])) {

			$config['file_name'] = 'gambar-'.rand(0,100).rand(0,100).'-'.date('ymds');
			$config['upload_path'] = './upload/products';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2048;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('gambar')) {
				$file 	= $this->upload->data();
				$gambar = $file['file_name'];
				$img 	= $this->input->post('cek_gambar');
				$target_file = './upload/products/'.$img;
				unlink($target_file);
				$this->product_model->edit($post, $gambar);
				$this->session->set_flashdata('message','Data & Gambar berhasil di Edit..!');
				$this->session->set_flashdata('check',2);
				redirect('products/');
			} 
			else {
				$this->session->set_flashdata('message','Gagal mengedit data & gambar..!');
				$this->session->set_flashdata('check',3);
				redirect('products/');
			}
		}else{

			$gambar = $this->input->post('cek_gambar');
			$this->product_model->edit($post, $gambar);
			$this->session->set_flashdata('message','Data berhasil di Edit..!');
			$this->session->set_flashdata('check',1);
			redirect('products/');
		}
	}
	public function del()
	{
		
		$id = $this->input->post('id_product');
		$data = $this->product_model->get($id);
		if($data->gambar == "default.jpg"){
			$this->product_model->del($id);
			$this->session->set_flashdata('message','Data '.$data->namabarang.' berhasil di Hapus..!');
			$this->session->set_flashdata('check',3);
			redirect('products');	
		}else {
			$target_file = './upload/products/'.$data->gambar;
			unlink($target_file);
			$this->product_model->del($id);
			$this->session->set_flashdata('message','Data '.$data->namabarang.' berhasil di Hapus..!');
			$this->session->set_flashdata('check',3);
			redirect('products');
		}
	}
}
