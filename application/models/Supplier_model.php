<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

    public function getall()
    {
        $query = $this->db->from('suppliers')->order_by('nama','ASC')->get();
        return $query;
    }
    public function get($id)
    {
        $this->db->from('suppliers')->where('id', $id);
    }
    public function add($post)
    {
        $params['nama']     = $post['nama'];
        $params['no_telp']  = $post['no_telp'];
        $params['alamat']   = $post['alamat'];
        $this->db->insert('suppliers', $params);
    }
    public function edit($post)
    {
        $id = $post['id'];
        $params['nama']     = $post['nama'];
        $params['no_telp']  = $post['no_telp'];
        $params['alamat']   = $post['alamat'];
        $this->db->where('id', $id);
        $this->db->update('suppliers', $params);
        
    }
    public function del($id)
    {
        $this->db->where('id', $id)->delete('suppliers');
        
    }

}