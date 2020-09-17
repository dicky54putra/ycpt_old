<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_pendidikan extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_unit_pendidikan');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$data['unit_pendidikan'] 	= $this->M_unit_pendidikan->select_all_unit_pendidikan();
		$data['page'] 		= "Unit Pendidikan";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Unit Pendidikan";
		$this->template->views('unit_pendidikan/index', $data);

	}

	public function add() 
	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Unit Pendidikan";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Unit Pendidikan";
		$this->template->views('unit_pendidikan/add', $data);

	}

	public function save()
	{

		$data = array(

			'unit_pendidikan'	=> $this->input->post('unit_pendidikan'),
			'alamat_sekolah'	=> $this->input->post('alamat_sekolah')

		);

		$this->M_unit_pendidikan->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('unit_pendidikan/index');

	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Unit Pendidikan";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Unit Pendidikan";

		$where = array('id_unit_pendidikan' => $id);
		$data['unit_pendidikan'] = $this->M_unit_pendidikan->edit_data($where,'unit_pendidikan')->result();
		$this->template->views('unit_pendidikan/edit',$data);

	}

	function update()
	{

		$id 				= $this->input->post('id_unit_pendidikan');
		$unit_pendidikan 	= $this->input->post('unit_pendidikan');
		$alamat_sekolah 	= $this->input->post('alamat_sekolah');

		$data = array(

			'unit_pendidikan' 			=> $unit_pendidikan,
			'alamat_sekolah' 			=> $alamat_sekolah

		);

		$where = array(

			'id_unit_pendidikan' => $id

		);

		$this->M_unit_pendidikan->update_data($where,$data,'unit_pendidikan');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('unit_pendidikan/index');

	}

	public function delete($id) 
	{

		$data = array('id_unit_pendidikan' => $id);
		$this->M_unit_pendidikan->delete($data,'unit_pendidikan');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('unit_pendidikan/index');

	}
}