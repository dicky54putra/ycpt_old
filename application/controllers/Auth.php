<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			$username 	= $this->input->post('username', 'trim');
			$password 	= md5($this->input->post('password', 'trim'));
			$level 		= $this->input->post('level');

			// $data = $this->M_auth->login($username, $password, $level);
			if ($level == 0) {
				$data = $this->db->get_where('admin', ['username' => $username, 'password' => $password])->row();
			} else {
				$data = $this->db->get_where('user', ['username' => $username, 'password' => $password])->row();
			}

			// var_dump($data);
			// die;

			if ($data) {
				$session = [
					'userdata' 	=> $data,
					'status' 	=> "Loged in",
					'level' 	=> $level
				];
				$this->session->set_userdata($session);
				redirect('Home');
			} else {
				$this->session->set_flashdata('error_msg', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Username atau Password Salah!.</div>');


				// echo $this->session->flashdata('error_msg');
				// $this->session->set_flashdata('error_msg', '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  Username atau Password Salah!.</div>');
				redirect('auth');
			}
		}
	}

	public function login()
	{
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
