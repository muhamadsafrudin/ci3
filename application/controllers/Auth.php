<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');	
	}

	public function login()
	{	
		check_alredy_login();
		$this->load->view('auth/login');
	}
	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$query = $this->user_model->login($post);
			if($query->num_rows() > 0 ){
				$row = $query->row();
				if($row->level == 1){
					$role = "admin";
				}else{
					$role = "user";
				}
				$params = array(
					'id' 		=> $row->id,
					'level' 	=> $row->level,
				);
				$this->session->set_userdata($params);
				echo "<script>
				alert('login berhasil sebagai ".$role."');
				window.location = '".site_url('dashboard')."';
				</script>";
			}else{
				echo "<script>
				alert('maaf, login gagal');
				window.location = '".site_url('auth/login')."';
				</script>";
			}	
		}
	}

	public function logout()
	{
		$params = array('id','level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
