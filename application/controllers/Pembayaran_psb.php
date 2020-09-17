<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_psb extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_pembayaran_psb');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Pembayaran PPDB";
		$data['judul'] 		= "PPDB";
		$data['deskripsi'] 	= "Manage Data Pembayaran PPDB";
		$data['pembayaran_psb'] = $this->M_pembayaran_psb->select_all_pembayaran_psb($id);
		$this->template->views('pembayaran_psb/index', $data);

	}

	public function add() 
	{

		$data['userdata']		= $this->userdata;
		$id 					= $this->userdata->id_user;
		$data['page'] 			= "Pembayaran PPDB";
		$data['judul'] 			= "PPDB";
		$data['deskripsi'] 		= "Manage Pembayaran PPDB";
		$data['nomor'] 			= $this->M_pembayaran_psb->select_nomor();
		$data['tahun_ajaran'] 	= $this->M_pembayaran_psb->select_all_tahun_ajaran();
		$data['pendaftaran'] 	= $this->M_pembayaran_psb->select_all_pendaftaran($id);
		$this->template->views('pembayaran_psb/add', $data);

	}

	public function save_satu()
	{

		$data = array(

			'id_pembayaran_psb'	=> $this->input->post('id_pembayaran_psb'),
			'tanggal'			=> $this->input->post('tanggal'),
			'id_tahun_ajaran'	=> $this->input->post('id_tahun_ajaran'),
			'id_daftar'			=> $this->input->post('id_daftar')

		);

		$id_pembayaran_psb 		= $this->input->post('id_pembayaran_psb');
		$this->M_pembayaran_psb->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('pembayaran_psb/detail/'.$id_pembayaran_psb);

	}

	function detail($id_pembayaran_psb)
	{
		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Pembayaran PPDB";
		$data['judul'] 		= "PPDB";
		$data['deskripsi'] 	= "Manage Data Pembayaran PPDB";

		$data['pembayaran_psb'] 		= $this->M_pembayaran_psb->select_all_pembayaran_detail($id_pembayaran_psb);
		$data['setting_pembayaran_psb'] = $this->M_pembayaran_psb->select_all_setting_pembayaran_psb($id);
		$data['detail_pembayaran_psb'] 	= $this->M_pembayaran_psb->select_all_detail_pembayaran_psb($id_pembayaran_psb);
		$data['total_pembayaran'] 		= $this->M_pembayaran_psb->select_all_total_pembayaran($id_pembayaran_psb);
		// $data['setting_pembayaran'] 	= $this->M_pembayaran_psb->select_all_setting_bayar();
		$this->template->views('pembayaran_psb/detail',$data);
	}

	function cetak($id_pembayaran_psb)
	{
		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		// $data['page'] 		= "Pembayaran";
		// $data['judul'] 		= "Data Pembayaran";
		// $data['deskripsi'] 	= "Manage Data Pembayaran";

		$data['user_unit_pendidikan'] 	= $this->M_pembayaran_psb->select_all_pembayaran_psb($id);
		$data['pembayaran_psb'] 		= $this->M_pembayaran_psb->select_all_pembayaran_detail($id_pembayaran_psb);
		$data['detail_pembayaran_psb'] 	= $this->M_pembayaran_psb->select_all_detail_pembayaran_psb($id_pembayaran_psb);
		$data['total_pembayaran'] 		= $this->M_pembayaran_psb->select_all_total_pembayaran($id_pembayaran_psb);

		$this->load->view('pembayaran_psb/cetak',$data);
	}

	public function save_dua()
	{

		$data = array(

			'id_pembayaran_psb'			=> $this->input->post('id_pembayaran_psb'),
			'id_setting_pembayaran_psb'	=> $this->input->post('id_setting_pembayaran_psb'),
			'nominal'					=> $this->input->post('nominal')

		);

		$id_pembayaran_psb = $this->input->post('id_pembayaran_psb');
		$this->M_pembayaran_psb->insert_detail_pembayaran_psb($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('pembayaran_psb/detail/'.$id_pembayaran_psb);

	}

	public function delete($id_detail_pembayaran_psb,$id_pembayaran_psb) 
	{

		$pembayaran_psb = $id_pembayaran_psb;
		$data = array('id_detail_pembayaran_psb' => $id_detail_pembayaran_psb);
		$this->M_pembayaran_psb->delete($data,'detail_pembayaran_psb');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('pembayaran_psb/detail/'.$pembayaran_psb);

	}

	public function delete_pembayaran($id_pembayaran_psb) 
	{

		$data = array('id_pembayaran_psb' => $id_pembayaran_psb);
		$this->M_pembayaran_psb->delete($data,'pembayaran_psb');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('pembayaran_psb/index');

	}
	
}