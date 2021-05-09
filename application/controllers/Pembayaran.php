<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {


    public function __construct()
    {
        parent::__construct();;
        check_not_login();
        $this->load->model('pembayaran_model');
        $this->load->model('transaksi_model');
    }
    public function index()
    {
        $data['pembayaran'] = $this->pembayaran_model->join();
        $this->template->load('template','pembayaran/index', $data);
    }
    public function detail($id)
    {
        $data['pembayaran'] = $this->pembayaran_model->join($id);
        //print_r($data);
        $this->template->load('template','pembayaran/detail', $data );
    }

    public function del()
    {
        $id = $this->input->post('id_pembayaran');
        $idp = $this->input->post('id_transaksi');
        $this->pembayaran_model->del($id);
        $this->transaksi_model->del($idp);
        $this->session->set_flashdata('message','data berhasil di hapus');
        $this->session->set_flashdata('check',3);
        redirect('pembayaran/');
    }

}