<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_kelas');
	}

	public function index()
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Kelas";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Kelas";
		$data['kelas'] 	= $this->M_kelas->select_all_kelas($id);
		$this->template->views('kelas/index', $data);
	}

	public function add()
	{
		$tipe_kelas = $this->db->get('tipe_kelas')->result();

		// var_dump($tipe_kelas);
		// die;

		$data['userdata']			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Kelas";
		$data['judul'] 				= "Data Master";
		$data['deskripsi'] 			= "Manage Data Kelas";
		$data['unit_pendidikan'] 	= $this->M_kelas->select_all_unit_pendidikan($id);
		$data['tipe_kelas'] 	= $tipe_kelas;
		$this->template->views('kelas/add', $data);
	}

	public function save()
	{

		$data = array(
			'kelas'				=> $this->input->post('kelas'),
			'id_unit_pendidikan' => $this->input->post('id_unit_pendidikan'),
			'id_tipe_kelas' => $this->input->post('id_tipe_kelas')
		);

		$this->M_kelas->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('kelas/index');
	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Kelas";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Kelas";

		$where = array('id_kelas' => $id);
		$data['kelas'] = $this->M_kelas->edit_data($where, 'kelas')->result();
		$this->template->views('kelas/edit', $data);
	}

	function update()
	{

		$id 				= $this->input->post('id_kelas');
		$kelas 				= $this->input->post('kelas');
		$id_unit_pendidikan = $this->input->post('id_unit_pendidikan');

		$data = array(

			'kelas' 				=> $kelas,
			'id_unit_pendidikan' 	=> $id_unit_pendidikan

		);

		$where = array(

			'id_kelas' => $id

		);

		$this->M_kelas->update_data($where, $data, 'kelas');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('kelas/index');
	}

	public function delete($id)
	{

		$data = array('id_kelas' => $id);
		$this->M_kelas->delete($data, 'kelas');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('kelas/index');
	}
}
