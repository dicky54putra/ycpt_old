<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kelas_siswa extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_laporan_kelas_siswa');

	}

	public function index() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Kelas Siswa";
		$data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_kelas_siswa->select_all_kelas_siswa($id);
		$this->template->views('laporan_kelas_siswa/index', $data);

	}

	public function filter() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$id_kelas_siswa 			= $this->input->post('id_kelas_siswa');
		// $status 					= $this->input->post('status');
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Kelas Siswa";
		$data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_kelas_siswa->select_all_kelas_siswa($id);
		$data['kelas_siswa1'] 		= $this->M_laporan_kelas_siswa->select_all_kelas_siswa1($id_kelas_siswa);
		$data['kelas_siswa_detail'] = $this->M_laporan_kelas_siswa->select_all_kelas_siswa_detail($id_kelas_siswa);
		$this->template->views('laporan_kelas_siswa/hasil_filter', $data);

	}

	public function cetak($id_kelas_siswa) 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Kelas Siswa";
		$data['deskripsi'] 			= "";
		$data['kelas_siswa1'] 		= $this->M_laporan_kelas_siswa->select_all_kelas_siswa1($id_kelas_siswa);
		$data['kelas_siswa_detail'] = $this->M_laporan_kelas_siswa->select_all_kelas_siswa_detail($id_kelas_siswa);
		$this->load->view('laporan_kelas_siswa/cetak', $data);

	}

	
}