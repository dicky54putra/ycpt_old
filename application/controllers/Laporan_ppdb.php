<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_ppdb extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_laporan_ppdb');
	}

	public function index()
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan PPDB";
		$data['deskripsi'] 			= "";
		$data['tahun_ajaran'] 		= $this->M_laporan_ppdb->select_all_tahun_ajaran();
		$this->template->views('laporan_ppdb/index', $data);
	}

	public function filter()
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$id_tahun_ajaran 			= $this->input->post('id_tahun_ajaran');
		// $status 					= $this->input->post('status');
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan PPDB";
		$data['deskripsi'] 			= "";
		$data['tahun_ajaran'] 		= $this->M_laporan_ppdb->select_all_tahun_ajaran();
		$data['pendaftaran'] 		= $this->M_laporan_ppdb->select_all_pendaftaran($id, $id_tahun_ajaran);
		// $data['pendaftaran1'] 		= $this->M_laporan_ppdb->select_all_pendaftaran1($id, $id_tahun_ajaran);
		$data['pendaftaran1'] 		= $this->db->get_where('tahun_ajaran', ['id_tahun_ajaran' => $id_tahun_ajaran])->row();
		$this->template->views('laporan_ppdb/hasil_filter', $data);
	}

	public function cetak($id_tahun_ajaran)
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan PPDB";
		$data['deskripsi'] 			= "";
		// $data['tahun_ajaran'] 		= $this->M_laporan_ppdb->select_all_tahun_ajaran($id);
		$data['pendaftaran'] 		= $this->M_laporan_ppdb->select_all_pendaftaran($id, $id_tahun_ajaran);
		// $data['pendaftaran1'] 		= $this->M_laporan_ppdb->select_all_pendaftaran1($id, $id_tahun_ajaran);
		$data['pendaftaran1'] 		= $this->db->get_where('tahun_ajaran', ['id_tahun_ajaran' => $id_tahun_ajaran])->row();
		$this->load->view('laporan_ppdb/cetak', $data);
	}
}
