<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_spp extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_laporan_spp');

	}

	public function index() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Tahun Ajaran";
		$data['judul'] 				= "Laporan Pembayaran";
		$data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_spp->select_all_kelas_siswa($id);
		$data['setting_pembayaran'] = $this->M_laporan_spp->select_all_setting_pembayaran($id);

		$this->template->views('laporan_spp/index', $data);

	}

	public function index_admin() 
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Laporan";
		$data['judul'] 		= "Laporan";
		$data['deskripsi'] 	= "Laporan Pembayaran Per Kelas";
		$data['unit_pendidikan'] = $this->M_laporan_spp->select_unit_pendidikan();

		$this->template->views('laporan_spp/index_admin', $data);

	}

	public function index_admin1($id) 
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Laporan";
		$data['judul'] 		= "Laporan";
		$data['deskripsi'] 	= "Laporan Pembayaran Per Kelas";
		$data['kelas_siswa'] 		= $this->M_laporan_spp->select_kelas_siswa($id);
		$data['setting_pembayaran'] = $this->M_laporan_spp->select_setting_pembayaran($id);
		$data['unit_pendidikan'] 	= $this->M_laporan_spp->select_unit_pendidikan1($id);

		$this->template->views('laporan_spp/index_admin1', $data);

	}

	public function filter() 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$id_kelas_siswa 			= $this->input->post('id_kelas_siswa');
		$id_setting_pembayaran 		= $this->input->post('id_setting_pembayaran');
		$data['page'] 				= "Tahun Ajaran";
		$data['judul'] 				= "Laporan Pembayaran";
		$data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_spp->select_all_kelas_siswa($id);
		$data['setting_pembayaran'] = $this->M_laporan_spp->select_all_setting_pembayaran($id);	
		$data['kelas'] 				= $this->M_laporan_spp->select_all_pembayaran($id_kelas_siswa, $id_setting_pembayaran);
		$data['kelas1'] 			= $this->M_laporan_spp->select_all_kelas($id_kelas_siswa);
		$data['setting_pembayaran1'] = $this->M_laporan_spp->select_all_setting_pembayaran1($id_setting_pembayaran);	
		$this->template->views('laporan_spp/hasil_filter', $data);

	}

	public function filter1($id) 
	{

		$data['userdata'] 			= $this->userdata;
		// $id 						= $this->userdata->id_user;
		$id_kelas_siswa 			= $this->input->post('id_kelas_siswa');
		$id_setting_pembayaran 		= $this->input->post('id_setting_pembayaran');
		$data['page'] 				= "Tahun Ajaran";
		$data['judul'] 				= "Laporan Pembayaran";
		$data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_spp->select_kelas_siswa($id);
		$data['setting_pembayaran'] = $this->M_laporan_spp->select_setting_pembayaran($id);	
		$data['kelas'] 				= $this->M_laporan_spp->select_all_pembayaran($id_kelas_siswa, $id_setting_pembayaran);
		$data['kelas1'] 			= $this->M_laporan_spp->select_all_kelas($id_kelas_siswa);
		$data['setting_pembayaran1'] = $this->M_laporan_spp->select_all_setting_pembayaran1($id_setting_pembayaran);
		$data['unit_pendidikan'] 	= $this->M_laporan_spp->select_unit_pendidikan1($id);

		$this->template->views('laporan_spp/hasil_filter_admin', $data);

	}

	public function cetak($id_kelas_siswa,$id_setting_pembayaran) 
	{

		$data['userdata'] 			= $this->userdata;
		$id 						= $this->userdata->id_user;
		// $id_kelas_siswa 			= $this->input->post('id_kelas_siswa');
		// $id_setting_pembayaran 		= $this->input->post('id_setting_pembayaran');
		// $data['page'] 				= "Tahun Ajaran";
		// $data['judul'] 				= "Laporan Pembayaran";
		// $data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_spp->select_all_kelas_siswa($id);
		$data['setting_pembayaran'] = $this->M_laporan_spp->select_all_setting_pembayaran($id);	
		$data['kelas'] 				= $this->M_laporan_spp->select_all_pembayaran($id_kelas_siswa, $id_setting_pembayaran);
		$data['kelas1'] 			= $this->M_laporan_spp->select_all_kelas($id_kelas_siswa);
		$data['setting_pembayaran1'] = $this->M_laporan_spp->select_all_setting_pembayaran1($id_setting_pembayaran);	
		$this->load->view('laporan_spp/cetak', $data);

	}

	public function cetak1($id,$id_kelas_siswa,$id_setting_pembayaran) 
	{

		$data['userdata'] 			= $this->userdata;
		// $id 						= $this->userdata->id_user;
		// $id_kelas_siswa 			= $this->input->post('id_kelas_siswa');
		// $id_setting_pembayaran 		= $this->input->post('id_setting_pembayaran');
		// $data['page'] 				= "Tahun Ajaran";
		// $data['judul'] 				= "Laporan Pembayaran";
		// $data['deskripsi'] 			= "";
		$data['kelas_siswa'] 		= $this->M_laporan_spp->select_kelas_siswa($id);
		$data['setting_pembayaran'] = $this->M_laporan_spp->select_setting_pembayaran($id);	
		$data['kelas'] 				= $this->M_laporan_spp->select_all_pembayaran($id_kelas_siswa, $id_setting_pembayaran);
		$data['kelas1'] 			= $this->M_laporan_spp->select_all_kelas($id_kelas_siswa);
		$data['setting_pembayaran1'] = $this->M_laporan_spp->select_all_setting_pembayaran1($id_setting_pembayaran);	
		$this->load->view('laporan_spp/cetak', $data);

	}

	
}