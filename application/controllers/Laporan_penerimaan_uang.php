<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_penerimaan_uang extends AUTH_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_laporan_penerimaan_uang');
	}

	public function index() 
	{
		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Penerimaan Uang";
		$data['deskripsi'] 			= "";
		$data['unit_pendidikan'] 	= $this->M_laporan_penerimaan_uang->select_all_unit_pendidikan($id);
		$data['tahun_ajaran'] 		= $this->M_laporan_penerimaan_uang->select_all_tahun_ajaran();
		$this->template->views('laporan_penerimaan_uang/index', $data);
	}

	public function index_admin() 
	{
		$data['userdata'] 			= $this->userdata;
		// $id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Penerimaan Uang";
		$data['deskripsi'] 			= "";
		// $data['unit_pendidikan'] 	= $this->M_laporan_penerimaan_uang->select_all_unit_pendidikan($id);
		// $data['tahun_ajaran'] 		= $this->M_laporan_penerimaan_uang->select_all_tahun_ajaran();
		$this->template->views('laporan_penerimaan_uang/index_admin', $data);
	}
}