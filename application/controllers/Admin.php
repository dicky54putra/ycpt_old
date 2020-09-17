<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends AUTH_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data['userdata'] 	= $this->userdata;
		$data['dataAdmin'] 	= $this->M_admin->select_all_admin();
		$data['page'] 		= "admin";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Admin";
		$this->template->views('admin/index', $data);
	}

	public function add()
	{
		$data['userdata']	= $this->userdata;
		$data['page'] 		= "admin";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Admin";
		$this->template->views('admin/form_add', $data);
	}

	public function save()
	{
		$data = array(

			'nama'		=> $this->input->post('nama'),
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password'))
			// 'foto'		=> $this->input->post('foto')
		);

		$this->M_admin->insert($data);
		redirect('admin/index');
	}

	function edit($id)
	{
		$data['userdata']	= $this->userdata;
		$data['page'] 		= "admin";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Admin";
		$where = array('id' => $id);
		$data['admin'] = $this->M_admin->edit_data($where, 'admin')->result();
		$this->template->views('admin/form_edit', $data);
	}

	function update()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$username 	= $this->input->post('username');
		//$password 	= md5($this->input->post('password'));
		$data = array(
			'nama' 		=> $nama,
			'username' 	=> $username
			//'password' 	=> $password
		);

		$where = array(
			'id' => $id
		);


		$this->M_admin->update_data($where, $data, 'admin');
		redirect('admin/index');
	}

	public function delete($id)
	{
		$data = array('id' => $id);
		$this->M_admin->delete($data, 'admin');
		redirect('admin/index');
	}
}
