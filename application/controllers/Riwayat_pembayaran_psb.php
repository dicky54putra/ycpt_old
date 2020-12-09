<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_Pembayaran_psb extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_riwayat_pembayaran_psb');
	}

	public function index()
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran PPDB";
		$data['judul'] 		= "Riwayat Pembayaran PPDB";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran PPDB";
		$data['pendaftaran'] = $this->M_riwayat_pembayaran_psb->select_all_pendaftaran($id);
		$this->template->views('riwayat_pembayaran_psb/index', $data);
	}

	function detail($nomor_daftar, $id_tahun_ajaran)
	{
		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran PPDB";
		$data['judul'] 		= "Riwayat Pembayaran PPDB";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran PPDB";

		$data['pendaftaran'] 		= $this->M_riwayat_pembayaran_psb->select_all_detail_pendaftaran($nomor_daftar);
		foreach ($data['pendaftaran']  as $k) {
		}
		// $data['total_pembayaran'] 	= $this->M_riwayat_pembayaran_psb->select_all_total_bayar_by_tipe($nomor_daftar);
		$data['setting_pembayaran'] = $this->M_riwayat_pembayaran_psb->select_all_setting_bayar($id_tahun_ajaran, $id, $k->jenis_kelamin);
		$this->template->views('riwayat_pembayaran_psb/detail', $data);
	}

	public function index_admin()
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran PPDB";
		$data['judul'] 		= "Riwayat Pembayaran PPDB";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran PPDB";
		$data['unit_pendidikan'] = $this->M_riwayat_pembayaran_psb->select_all_unit_pendidikan();
		$this->template->views('riwayat_pembayaran_psb/index_admin', $data);
	}

	function detail_pendaftaran($id)
	{
		$data['userdata']	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran PPDB";
		$data['judul'] 		= "Riwayat Pembayaran PPDB";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran PPDB";

		$data['pendaftaran'] = $this->M_riwayat_pembayaran_psb->select_pendaftaran($id);
		$this->template->views('riwayat_pembayaran_psb/detail_pendaftaran', $data);
	}

	function detail_pembayaran_pendaftaran($id_unit_pendidikan, $nomor_daftar, $id_tahun_ajaran)
	{
		$data['userdata']	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran PPDB";
		$data['judul'] 		= "Riwayat Pembayaran PPDB";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran PPDB";

		// echo $id_unit_pendidikan;
		// echo $nis;
		// exit();

		$data['pendaftaran'] 	   = $this->M_riwayat_pembayaran_psb->select_all_detail_pendaftaran1($nomor_daftar);
		// $data['total_pembayaran'] 	= $this->M_riwayat_pembayaran->select_all_total_bayar_by_tipe($nis);
		$data['setting_pembayaran'] = $this->M_riwayat_pembayaran_psb->select_all_setting_bayar1($id_tahun_ajaran, $id_unit_pendidikan);
		$this->template->views('riwayat_pembayaran_psb/detail_pembayaran', $data);
	}
}
