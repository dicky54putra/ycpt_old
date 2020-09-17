<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends AUTH_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index() 
	{
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "User";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data User";

		$data['dataUser'] 	= $this->M_user->select_all_user();
		$this->template->views('user/index', $data);
	}

	public function add() 
	{
		$data['userdata']	= $this->userdata;
		$data['page'] 		= "User";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data User";

		$data['unit_pendidikan'] 	= $this->M_user->select_all_unit_pendidikan();
		$this->template->views('user/form_add', $data);
	}

	public function save()
	{
		$data = array(

			'nama'		=> $this->input->post('nama'),
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'id_unit_pendidikan'	=> $this->input->post('id_unit_pendidikan')
			// 'foto'		=> $this->input->post('foto')
		);
	
		$this->M_user->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('user/index');
	}

	function edit($id)
	{
		$data['userdata']	= $this->userdata;
		$data['page'] 		= "User";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data User";
		$where = array('id_user' => $id);
		$data['user'] = $this->M_user->edit_data($where,'user')->result();
		$data['unit_pendidikan'] = $this->M_user->select_all_unit_pendidikan();
		$this->template->views('user/form_edit',$data);
	}

	function update()
	{
		$id 		= $this->input->post('id_user');
		$nama 		= $this->input->post('nama');
		$username 	= $this->input->post('username');
		$id_unit_pendidikan 	= $this->input->post('id_unit_pendidikan');
		//$password 	= md5($this->input->post('password'));
		$data = array(
			'nama' 		=> $nama,
			'username' 	=> $username,
			'id_unit_pendidikan' => $id_unit_pendidikan
			//'password' 	=> $password
		);

		$where = array(
			'id_user' => $id
		);

	 
		$this->M_user->update_data($where,$data,'user');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('user/index');
	}

	public function delete($id) 
	{

	$data = array('id_user' => $id);
		$this->M_user->delete($data,'user');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('user/index');
	}
}