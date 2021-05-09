<?php
Class Fungsi {
    
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_model');
        $id = $this->ci->session->userdata('id');
        $user_data = $this->ci->user_model->get($id)->row();
        return $user_data;
    }

}