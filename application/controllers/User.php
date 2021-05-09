<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['users'] = $this->user_model->get(); 
        $this->template->load('template','user/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name','Nama','required');
        $this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('konfir','konfirmasi password','required|matches[password]',array('matches'=>'%s tidak sesuai dengan password'));
        $this->form_validation->set_rules('level','Level','required');

        $this->form_validation->set_message('required','%s masih kosong..!');
        $this->form_validation->set_message('min_length','%s minimal 5 karakter..!');
        $this->form_validation->set_message('is_unique','%s sudah digunakan..!');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('template','user/add');
        }
        else
        {
            $post = $this->input->post(null, TRUE);
            $this->user_model->add($post);
            redirect('user/');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name','Nama','required');
        $this->form_validation->set_rules('username','Username','required|min_length[5]|callback_username_check');
        if($this->input->post('password')) {
            $this->form_validation->set_rules('password','Password','min_length[5]');
        }
        
        if($this->input->post('konfir')) {
            $this->form_validation->set_rules('konfir','konfirmasi password','matches[password]',array('matches'=>'%s tidak sesuai dengan password'));
        }
       
        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_message('required','%s masih kosong..!');
        $this->form_validation->set_message('min_length','%s minimal 5 karakter..!');
       
        if ($this->form_validation->run() == FALSE)
        {
            $query = $this->user_model->get($id);
            if($query->num_rows() > 0 ) {
                $data['user'] = $query->row();
                $this->template->load('template','user/edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan')</script>";
                echo "<script>window.location= '".site_url('user')."'</script>";  
            }    
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_model->edit($post);
            redirect('user/');
        }
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id != '$post[id]'");
        if($query->num_rows() > 0 ) {
            $this->form_validation->set_message('username_check','{field} sudah digunakan..!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del()
    {
        $id = $this->input->post('id');
        $this->user_model->del($id);
        if ($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil diHapus')</script>";
        }

        echo "<script>window.location= '".site_url('user')."'</script>";        
        
    }
}
