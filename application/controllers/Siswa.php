<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_siswa');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Siswa";
		$data['unit_pendidikan'] = $this->M_siswa->select_all_unit_pendidikan($id);
		$data['siswa'] 		= $this->M_siswa->select_all_siswa($id);
		$this->template->views('siswa/index', $data);

	}

	public function index_siswa() 
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Siswa";
		$data['unit_pendidikan'] = $this->M_siswa->select_unit_pendidikan();
		$this->template->views('siswa/index_siswa', $data);

	}

	function siswa_detail($id)
	{
		$data['userdata']	= $this->userdata;
		// $id_user 			= $this->userdata->id_user;
		$data['page'] 		= "Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Siswa";

		$data['siswa'] 		= $this->M_siswa->select_siswa($id);
		$data['unit_pendidikan_siswa'] = $this->M_siswa->select_unit_pendidikan_siswa($id);
		$this->template->views('siswa/detail_siswa',$data);
	}

	public function add() 
	{

		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Siswa";
		$data['unit_pendidikan'] = $this->M_siswa->select_all_unit_pendidikan($id);
		$this->template->views('siswa/add', $data);

	}

	public function save()
	{

		$data = array(

			'nis'				=> $this->input->post('nis'),
			'nama_siswa'		=> $this->input->post('nama_siswa'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
			'nama_ortu'			=> $this->input->post('nama_ortu'),
			'alamat'			=> $this->input->post('alamat'),
			'id_unit_pendidikan'=> $this->input->post('id_unit_pendidikan'),
			'status'			=> $this->input->post('status')

		);

		$this->M_siswa->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('siswa/index');

	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Siswa";

		$where 				= array('id_siswa' => $id);
		$data['siswa'] 		= $this->M_siswa->edit_data($where,'siswa')->result();
		$this->template->views('siswa/edit',$data);

	}

	function update()
	{

		$id 				= $this->input->post('id_siswa');
		$nis 				= $this->input->post('nis');
		$nama_siswa 		= $this->input->post('nama_siswa');
		$tempat_lahir 		= $this->input->post('tempat_lahir');
		$tanggal_lahir 		= $this->input->post('tanggal_lahir');
		$nama_ortu 			= $this->input->post('nama_ortu');
		$alamat				= $this->input->post('alamat');
		$id_unit_pendidikan	= $this->input->post('id_unit_pendidikan');
		$status				= $this->input->post('status');

		$data = array(

			'nis' 					=> $nis,
			'nama_siswa' 			=> $nama_siswa,
			'tempat_lahir' 			=> $tempat_lahir,
			'tanggal_lahir' 		=> $tanggal_lahir,
			'nama_ortu' 			=> $nama_ortu,
			'alamat' 				=> $alamat,
			'id_unit_pendidikan' 	=> $id_unit_pendidikan,
			'status' 				=> $status

		);

		$where = array(

			'id_siswa' => $id

		);

		$this->M_siswa->update_data($where,$data,'siswa');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('siswa/index');

	}

	public function delete($id) 
	{

		$data = array('id_siswa' => $id);
		$this->M_siswa->delete($data,'siswa');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('siswa/index');

	}
}