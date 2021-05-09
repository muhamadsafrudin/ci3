<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public function login($post)
        {
            $this->db->select('*')->from('user')->where('username', $post['username']);
            $this->db->where('password', sha1($post['password']));
            $query = $this->db->get();
            return $query;
        }

        public function get($id = null)
        {
            $this->db->from('user');
            if($id != null){
                $this->db->where('id', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        public function add($post)
        {
            $params['username'] = $post['username'];
            $params['password'] = sha1($post['password']);
            $params['name'] = $post['name'];
            $params['alamat'] = $post['alamat'];
            $params['level'] = $post['level'];
            $this->db->insert('user', $params);
        }

        public function edit($post)
        {
            $params['username'] = $post['username'];
            if(!empty($post['password'])){
                $params['password'] = sha1($post['password']);
            }
            $params['name'] = $post['name'];
            $params['alamat'] = $post['alamat'];
            $params['level'] = $post['level'];
            $this->db->where('id', $post['id']);
            $this->db->update('user', $params);
        }

        public function del($id)
        {
            $this->db->where('id', $id)->delete('user');
        }
}