<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function getall()
    {
        $query = $this->db->from('products')->get();
        return $query;
    }
    public function get($id)
    {
        return $this->db->get_where('products', array('id_product' => $id))->row();
    }
    public function add($post, $gambar)
    {
        $params['gambar']       = $gambar;
        $params['namabarang']   = $post['namabarang'];
        $params['harga']        = $post['harga'];
        $params['stok']        = $post['stok'];
        $params['keterangan']   = $post['keterangan'];
        $params['supplier_id']  = $post['supplier_id'];
        $this->db->insert('products', $params);
    }
    public function edit($post, $gambar)
    {
        $id = $post['id_product'];
        $params['gambar']       = $gambar;     
        $params['namabarang']   = $post['namabarang'];
        $params['harga']        = $post['harga'];
        $params['stok']         = $post['stok'];
        $params['keterangan']   = $post['keterangan'];
        $params['supplier_id']  = $post['supplier_id'];
        $this->db->where('id_product', $id);
        $this->db->update('products', $params);
        
    }
    public function del($id)
    {
        $this->db->where('id_product', $id)->delete('products');    
    }
    public function join()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('suppliers','suppliers.id = products.supplier_id'); 
        $this->db->order_by('namabarang', 'ASC');     
        $query = $this->db->get();
        return $query;
     }
}