<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    public function getall()
    {
        $query = $this->db->from('pembayaran')->get()->result();
        return $query;
    }
    public function join($id = null)
    {
        if($id != null ) {
            $query = $this->db->where('id_pembayaran', $id)
                                ->from('pembayaran')
                                    ->join('transaksi','transaksi.id_transaksi = pembayaran.transaksi_id')
                                        ->join('products','products.id_product = pembayaran.product_id')
                                            ->join('pembeli','pembeli.id_pembeli = pembayaran.pembeli_id')
                                                ->get()
                                                    ->row();
            return $query;
        } else {
            $query = $this->db->from('pembayaran')
                                ->join('transaksi','transaksi.id_transaksi = pembayaran.transaksi_id')
                                    ->join('products','products.id_product = pembayaran.product_id')
                                        ->join('pembeli','pembeli.id_pembeli = pembayaran.pembeli_id')
                                            ->get()
                                                ->result();
            return $query;
        }
        
    }

    public function add($post)
    {
        $params = array(
            'tanggal_bayar' => $post['tanggal_pembayaran'],
            'total_bayar'   => $post['total'],
            'transaksi_id'  => $post['id_transaksi'],
            'product_id'    => $post['product_id'],
            'pembeli_id'    => $post['pembeli_id'],
        );
        $query = $this->db->insert('pembayaran', $params);
        return $query;
    }

    public function del($id)
    {
        $query = $this->db->where('id_pembayaran', $id)->delete('pembayaran');
        return $query;
    }
}