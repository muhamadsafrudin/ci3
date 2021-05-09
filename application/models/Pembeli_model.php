<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli_model extends CI_Model
{

    public function getall()
    {
        $query = $this->db->from('pembeli')->order_by('nama','ASC')->get()->result();
        return $query;
    }
    public function add($post)
    {
        $params['nama']     = $post['nama'];
        $params['jk']       = $post['jk'];
        $params['no_telp']  = $post['no_telp'];
        $params['alamat']   = $post['alamat'];
        $query = $this->db->insert('pembeli', $params);
        return $query;
    }
    public function edit($post)
    {
        $params = array(
            'id_pembeli'=> $post['id_pembeli'],
            'nama'      => $post['nama'],
            'jk'        => $post['jk'],
            'no_telp'   => $post['no_telp'],
            'alamat'    => $post['alamat'],
        );
        $id = $params['id_pembeli'];
        $query = $this->db->where('id_pembeli', $id)->update('pembeli', $params);
        return $query;
    }
    public function del($id)
    {
        $this->db->where('id_pembeli', $id)->delete('pembeli');
    }

}