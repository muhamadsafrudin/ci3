<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('transaksi_model');
        $this->load->model('pembeli_model');
        $this->load->model('product_model');
        $this->load->model('pembayaran_model');
    }
    public function index()
    {
        $data = array(
            'transaksi' => $this->transaksi_model->join(),
            'product'   => $this->product_model->getall()->result(),
            'pembeli'   => $this->pembeli_model->getall(),
        ); 
        $this->template->load('template','transaksi/index', $data);
    }
    public function create()
    {
        $data = array(
            'transaksi' => $this->transaksi_model->join(),
            'product'   => $this->product_model->getall()->result(),
            'pembeli'   => $this->pembeli_model->getall(),
        ); 
        $this->template->load('template','transaksi/add', $data);
    }
    public function add()
    {
        $post = $this->input->post();
        $data = $this->db->where('id_product', $post['product_id'])->from('products')->get()->row();
        if( $post['jumlah'] > $data->stok ) {
            $this->session->set_flashdata('message','gagal menambah, Jumlah barang yg anda inputkan terlalu banyak..!');
            $this->session->set_flashdata('check',3);    
            redirect('transaksi/');
        } else {
            $this->db->query("UPDATE products SET stok = stok - ".$post['jumlah']."  WHERE id_product =".$post['product_id'] );
            $this->transaksi_model->add($post);
            $this->session->set_flashdata('message','data berhasil di Tambah');
            $this->session->set_flashdata('check',1);
            redirect('transaksi/');
        }
       
    }
    public function edit($id)
    {
        $data = array(
            'transaksi' => $this->transaksi_model->get($id),
            'product'   => $this->product_model->getall()->result(),
            'pembeli'   => $this->pembeli_model->getall(),
        );
         
        $this->template->load('template','transaksi/edit', $data);
    }
    public function update()
    {
        $post = $this->input->post();
        $transaksi = $this->db->where('id_transaksi', $post['id_transaksi'])->from('transaksi')->get()->row();
        $data = $this->db->where('id_product', $post['product_id'])->from('products')->get()->row();
        if($transaksi->status != 1 ){
            if( $post['jumlah'] > $data->stok + $transaksi->jumlah ) {
                $this->session->set_flashdata('message','gagal menambah, Jumlah barang yg anda inputkan terlalu banyak..!');
                $this->session->set_flashdata('check',3);    
                redirect('transaksi/');
            } else {
                $this->db->query("UPDATE products SET stok = stok + ".$transaksi->jumlah."  WHERE id_product =".$post['product_id'] );
                $this->transaksi_model->edit($post);
                $this->db->query("UPDATE products SET stok = stok - ".$post['jumlah']."  WHERE id_product =".$post['product_id'] );
                $this->session->set_flashdata('message','data berhasil di Edit..!');
                $this->session->set_flashdata('check',2);
                redirect('transaksi/');
            }
        }else{
            $this->session->set_flashdata('message','data sudah tidak bisa di edit..!');
            $this->session->set_flashdata('check',3);
            redirect('transaksi/');
        }
    }

    public function acc($id)
    {
        $data = array(
            'transaksi' => $this->transaksi_model->join($id),
        );
        $this->template->load('template','transaksi/acc', $data);
    }
    public function accept()
    {
        $post = $this->input->post();
        $sql = "UPDATE transaksi SET status = ".$post['status']."  WHERE id_transaksi =".$post['id_transaksi'];
        $this->db->query($sql);
        $this->pembayaran_model->add($post);
      //print_r($post);
        $this->session->set_flashdata('message','berhasil di accept..!');
        $this->session->set_flashdata('check',1);
        redirect('transaksi/');
    }
    public function detail($id)
    {
        $data['transaksi'] = $this->transaksi_model->join($id);
        $this->template->load('template','transaksi/detail', $data);
    }

    public function del()
    {
        $post = $this->input->post();
        $id = $post['id_transaksi'];
        print_r($post);
        $sql = "UPDATE transaksi SET hapus =  ".$post['hapus']." WHERE id_transaksi =".$id;
        $this->db->query($sql);
        $this->session->set_flashdata('message','data berhasil di Hapus..!');
        $this->session->set_flashdata('check',3);
        redirect('transaksi/');

    }

}