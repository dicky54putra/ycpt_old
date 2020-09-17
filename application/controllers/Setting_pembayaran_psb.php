<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_pembayaran_psb extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_setting_pembayaran_psb');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Setting Pembayaran PPBD";
		$data['judul'] 		= "Setting Pembayaran PPBD";
		$data['deskripsi'] 	= "Manage Setting Pembayaran PPBD";
		$data['setting_pembayaran_psb'] = $this->M_setting_pembayaran_psb->select_all_setting_pembayaran_psb($id);
		$this->template->views('setting_pembayaran_psb/index', $data);

	}

	public function add() 
	{

		$data['userdata']			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Setting Pembayaran PPBD";
		$data['judul'] 				= "Setting Pembayaran PPBD";
		$data['deskripsi'] 			= "Manage Setting Pembayaran PPBD";
		$data['tahun_ajaran'] 		= $this->M_setting_pembayaran_psb->select_all_tahun_ajaran();
		$data['tipe_pembayaran'] 	= $this->M_setting_pembayaran_psb->select_all_tipe_pembayaran();
		$data['user'] 				= $this->M_setting_pembayaran_psb->select_all_user($id);
		$this->template->views('setting_pembayaran_psb/add', $data);

	}

	public function save()
	{

		$data = array(

			'id_tahun_ajaran'		=> $this->input->post('id_tahun_ajaran'),
			'id_tipe_pembayaran'	=> $this->input->post('id_tipe_pembayaran'),
			'nominal'				=> $this->input->post('nominal'),
			'id_unit_pendidikan'	=> $this->input->post('id_unit_pendidikan')

		);

		$this->M_setting_pembayaran_psb->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('setting_pembayaran_psb/index');

	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Setting Pembayaran PPBD";
		$data['judul'] 		= "Setting Pembayaran PPBD";
		$data['deskripsi'] 	= "Manage Setting Pembayaran PPBD";

		$where = array('id_setting_pembayaran_psb' => $id);
		$data['tahun_ajaran'] 			= $this->M_setting_pembayaran_psb->select_all_tahun_ajaran();
		$data['tipe_pembayaran'] 		= $this->M_setting_pembayaran_psb->select_all_tipe_pembayaran();
		$data['setting_pembayaran_psb'] = $this->M_setting_pembayaran_psb->edit_data($where,'setting_pembayaran_psb')->result();
		$this->template->views('setting_pembayaran_psb/edit',$data);

	}

	function update()
	{

		$id 				= $this->input->post('id_setting_pembayaran_psb');
		$id_tahun_ajaran 	= $this->input->post('id_tahun_ajaran');
		$id_tipe_pembayaran = $this->input->post('id_tipe_pembayaran');
		$nominal 			= $this->input->post('nominal');
		$id_unit_pendidikan = $this->input->post('id_unit_pendidikan');

		$data = array(

			'id_tahun_ajaran' 		=> $id_tahun_ajaran,
			'id_tipe_pembayaran' 	=> $id_tipe_pembayaran,
			'nominal' 				=> $nominal,
			'id_unit_pendidikan' 	=> $id_unit_pendidikan

		);

		$where = array(

			'id_setting_pembayaran_psb' => $id

		);

		$this->M_setting_pembayaran_psb->update_data($where,$data,'setting_pembayaran_psb');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('setting_pembayaran_psb/index');

	}

	public function delete($id) 
	{

		$data = array('id_setting_pembayaran_psb' => $id);
		$this->M_setting_pembayaran_psb->delete($data,'setting_pembayaran_psb');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('setting_pembayaran_psb/index');

	}
}