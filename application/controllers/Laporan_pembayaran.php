<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pembayaran extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_laporan_pembayaran');

	}

	public function index() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Pembayaran";
		$data['deskripsi'] 			= "";
		$this->template->views('laporan_pembayaran/index', $data);

	}

	public function index_admin() 
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Laporan";
		$data['judul'] 		= "Laporan Pembayaran";
		$data['deskripsi'] 	= "Laporan Pembayaran Per Hari";
		$data['unit_pendidikan'] = $this->M_laporan_pembayaran->select_unit_pendidikan();

		$this->template->views('laporan_pembayaran/index_admin', $data);

	}

	public function index_admin1($id) 
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Laporan";
		$data['judul'] 		= "Laporan Pembayaran";
		$data['deskripsi'] 	= "Laporan Pembayaran Per Harian";
		// $data['kelas_siswa'] 		= $this->M_laporan_pembayaran->select_kelas_siswa($id);
		// $data['setting_pembayaran'] = $this->M_laporan_pembayaran->select_setting_pembayaran($id);
		$data['unit_pendidikan'] 	= $this->M_laporan_pembayaran->select_unit_pendidikan1($id);

		$this->template->views('laporan_pembayaran/index_admin1', $data);

	}

	public function filter() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$dari_tanggal 				= $this->input->post('dari_tanggal');
		$sampai_tanggal 			= $this->input->post('sampai_tanggal');
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Pembayaran";
		$data['deskripsi'] 			= "";
		$data['pembayaran'] 		= $this->M_laporan_pembayaran->select_all_pembayaran($id,$dari_tanggal,$sampai_tanggal);	
		$data['pembayaran1'] 		= $this->M_laporan_pembayaran->select_all_pembayaran1($id,$dari_tanggal,$sampai_tanggal);	
		$this->template->views('laporan_pembayaran/hasil_filter', $data);

	}

	public function filter1() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->input->post('id_unit_pendidikan');
		$dari_tanggal 				= $this->input->post('dari_tanggal');
		$sampai_tanggal 			= $this->input->post('sampai_tanggal');
		$data['page'] 				= "Laporan";
		$data['judul'] 				= "Laporan Pembayaran";
		$data['deskripsi'] 			= "";
		$data['pembayaran'] 		= $this->M_laporan_pembayaran->select_pembayaran($id,$dari_tanggal,$sampai_tanggal);	
		$data['pembayaran1'] 		= $this->M_laporan_pembayaran->select_pembayaran1($id,$dari_tanggal,$sampai_tanggal);	
		$this->template->views('laporan_pembayaran/hasil_filter_admin', $data);

	}

	// public function cetak($id_kelas_siswa,$id_setting_pembayaran) 
	// {

	// 	$data['userdata'] 			= $this->userdata;
	// 	$id 						= $this->userdata->id_user;
	// 	$data['kelas_siswa'] 		= $this->M_laporan_spp->select_all_kelas_siswa($id);
	// 	$data['setting_pembayaran'] = $this->M_laporan_spp->select_all_setting_pembayaran($id);	
	// 	$data['kelas'] 				= $this->M_laporan_spp->select_all_pembayaran($id_kelas_siswa, $id_setting_pembayaran);
	// 	$data['kelas1'] 			= $this->M_laporan_spp->select_all_kelas($id_kelas_siswa);
	// 	$data['setting_pembayaran1'] = $this->M_laporan_spp->select_all_setting_pembayaran1($id_setting_pembayaran);	
	// 	$this->load->view('laporan_spp/cetak', $data);

	// }

	
}