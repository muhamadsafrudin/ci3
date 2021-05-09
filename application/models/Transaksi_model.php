<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function getall()
    {
        $query = $this->db->from('transaksi')->get()->result();
        return $query;
    }
    public function get($id)
    {
        $query = $this->db->where('id_transaksi', $id)->from('transaksi')->get();
        return $query->row();
    }
    public function join($id = null )
    {
        if($id != null ){
            $query = $this->db->where('id_transaksi', $id)
                                ->from('transaksi')
                                ->join('products','products.id_product = transaksi.product_id')
                                ->join('pembeli','pembeli.id_pembeli = transaksi.pembeli_id');
            return $query->get()->row();
        }else {
            $query = $this->db->from('transaksi')
                                ->join('products','products.id_product = transaksi.product_id')
                                ->join('pembeli','pembeli.id_pembeli = transaksi.pembeli_id');
            return $query->get()->result();
        }
    }
    public function add($post)
    {
        $params = array(
            'product_id'    => $post['product_id'],
            'pembeli_id'    => $post['pembeli_id'],
            'tanggal'       => $post['tanggal'],
            'ket'           => $post['keterangan'],
            'jumlah'        => $post['jumlah'],
        );
        $query = $this->db->insert('transaksi', $params);
        return $query;
    }
    public function edit($post)
    {
        $params = [
            'id_transaksi'  => $post['id_transaksi'],
            'product_id'    => $post['product_id'],
            'pembeli_id'    => $post['pembeli_id'],
            'tanggal'       => $post['tanggal'],
            'ket'           => $post['keterangan'],
            'jumlah'        => $post['jumlah'],
        ];
        $query = $this->db->where('id_transaksi', $params['id_transaksi'])->update('transaksi', $params);
        return $query;
    }
    public function del($idp)
    {
        $query = $this->db->where('id_transaksi', $idp)
                    ->delete('transaksi');
        return $query;
    }
}
