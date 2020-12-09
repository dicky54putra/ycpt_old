<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_Pembayaran extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_riwayat_pembayaran');
	}

	public function index()
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran";
		$data['judul'] 		= "Riwayat Pembayaran";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran";
		$data['siswa'] 		= $this->M_riwayat_pembayaran->select_all_siswa($id);
		$this->template->views('riwayat_pembayaran/index', $data);
	}

	function detail($nis, $id_tahun_ajaran)
	{
		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran";
		$data['judul'] 		= "Riwayat Pembayaran";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran";

		$data['siswa'] 				= $this->M_riwayat_pembayaran->select_all_detail_siswa($nis);
		foreach ($data['siswa'] as $k) {
			$tipe_kelas = $k->id_tipe_kelas;
		}
		$data['setting_pembayaran'] = $this->M_riwayat_pembayaran->select_all_setting_bayar($nis, $id, $id_tahun_ajaran, $tipe_kelas);
		$data['nomor'] 				= $this->M_riwayat_pembayaran->select_nomor();
		$this->template->views('riwayat_pembayaran/detail', $data);
	}

	public function index_admin()
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran";
		$data['judul'] 		= "Riwayat Pembayaran";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran";
		$data['unit_pendidikan'] = $this->M_riwayat_pembayaran->select_all_unit_pendidikan();
		$this->template->views('riwayat_pembayaran/index_admin', $data);
	}

	function detail_siswa($id)
	{
		$data['userdata']	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran";
		$data['judul'] 		= "Riwayat Pembayaran";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran";

		$data['siswa'] 		= $this->M_riwayat_pembayaran->select_siswa($id);
		$this->template->views('riwayat_pembayaran/detail_siswa', $data);
	}

	function detail_pembayaran_siswa($id_unit_pendidikan, $nis)
	{
		$data['userdata']	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran";
		$data['judul'] 		= "Riwayat Pembayaran";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran";

		// echo $id_unit_pendidikan;
		// echo $nis;
		// exit();

		$data['siswa'] 				= $this->M_riwayat_pembayaran->select_all_detail_siswa1($nis);
		// $data['total_pembayaran']= $this->M_riwayat_pembayaran->select_all_total_bayar_by_tipe($nis);
		$data['setting_pembayaran'] = $this->M_riwayat_pembayaran->select_all_setting_bayar1($nis, $id_unit_pendidikan);
		$this->template->views('riwayat_pembayaran/detail_pembayaran', $data);
	}

	function cetak($id_siswa, $id_setting_pembayaran)
	{
		$data['userdata']			= $this->userdata;
		$id 						= $this->userdata->id_user;
		// $data['page'] 			= "Pembayaran";
		// $data['judul'] 			= "Data Pembayaran";
		// $data['deskripsi'] 		= "Manage Data Pembayaran";

		$data['siswa'] 					= $this->M_riwayat_pembayaran->select_siswa_cetak($id_siswa);
		$data['unit_pendidikan'] 		= $this->M_riwayat_pembayaran->select_unit_pendidikan_cetak($id);
		$data['setting_pembayaran'] 	= $this->M_riwayat_pembayaran->select_setting_pembayaran_cetak($id_setting_pembayaran);
		$data['setting_pembayaran1'] 	= $this->M_riwayat_pembayaran->select_setting_pembayaran_cetak1($id_setting_pembayaran);
		// $data['pembayaran'] 			= $this->M_riwayat_pembayaran->select_all_pembayaran_detail($id_pembayaran);
		// $data['detail_pembayaran'] 	= $this->M_riwayat_pembayaran->select_all_detail_pembayaran($id_pembayaran);
		// $data['total_pembayaran'] 	= $this->M_riwayat_pembayaran->select_all_total_pembayaran($id_pembayaran);

		$this->load->view('riwayat_pembayaran/cetak', $data);
	}

	public function bayar($nis, $id_tahun_ajaran_siswa, $id_tahun_ajaran, $id_setting_pembayaran, $hasil2, $nominal, $id_siswa)
	{
		$sql = $this->db->query("SELECT * FROM kelas_siswa_detail
				LEFT JOIN kelas_siswa ON kelas_siswa.id_kelas_siswa = kelas_siswa_detail.id_kelas_siswa
				LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
				WHERE kelas_siswa.id_tahun_ajaran = '$id_tahun_ajaran' AND kelas_siswa_detail.id_siswa = '$id_siswa'");
		// $data3 = $this->db->query($sql);
		// return $data3->result();
		foreach ($sql->result_array() as $row => $a) {
		}

		// echo $nis; 					
		// echo $hasil2;				
		// echo $id_tahun_ajaran_siswa;	
		// echo $id_tahun_ajaran;		
		// echo $id_setting_pembayaran	;
		// echo $nominal;
		// echo $id_siswa;
		// echo $a['id_kelas_siswa_detail'];
		// exit();

		$nis 						= $nis;
		$id_pembayaran 				= $hasil2;
		$tanggal					= date('Y-m-d');
		$id_tahun_ajaran_siswa		= $id_tahun_ajaran_siswa;
		$id_tahun_ajaran_sk			= $id_tahun_ajaran;
		$id_kelas_siswa_detail		= $a['id_kelas_siswa_detail'];
		$id_setting_pembayaran		= $id_setting_pembayaran;
		$nominal					= $nominal;
		$id_siswa					= $id_siswa;

		$data1 = array(

			'id_pembayaran'			=> $hasil2,
			'tanggal'				=> $tanggal,
			'id_tahun_ajaran'		=> $id_tahun_ajaran_sk,
			'id_kelas_siswa_detail'	=> $id_kelas_siswa_detail

		);

		$data2 = array(

			'id_pembayaran'			=> $hasil2,
			'id_setting_pembayaran'	=> $id_setting_pembayaran,
			'nominal'				=> $nominal

		);

		$this->M_riwayat_pembayaran->insert_pembayaran($data1);
		$this->M_riwayat_pembayaran->insert_detail_pembayaran($data2);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('riwayat_pembayaran/detail/' . $nis . '/' . $id_tahun_ajaran_siswa);
	}

	public function view_pembayaran($nis, $setting_pembayaran, $id_tahun_ajaran, $id_unit_pendidikan, $id_tipe_pembayaran)
	{
		$sql = $this->db->query("SELECT a.nominal, a.id_detail_pembayaran, c.id_siswa, e.tipe_pembayaran, e.id_tipe_pembayaran, g.tahun_ajaran, g.id_tahun_ajaran from detail_pembayaran a 
		LEFT JOIN pembayaran b on b.id_pembayaran = a.id_pembayaran 
		LEFT JOIN kelas_siswa_detail f on f.id_kelas_siswa_detail = b.id_kelas_siswa_detail 
		LEFT JOIN siswa c on c.id_siswa = f.id_siswa 
		LEFT JOIN setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran 
		LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran 
		LEFT JOIN tahun_ajaran g ON g.id_tahun_ajaran = d.id_tahun_ajaran
		WHERE c.nis = '$nis' and d.id_setting_pembayaran = '$setting_pembayaran' AND d.id_tahun_ajaran = '$id_tahun_ajaran'");

		// $sql_result = $sql->result_array();

		// var_dump($sql->result_array());
		// die;

		// $sql1 = $this->db->query("SELECT a.nominal, a.id_detail_pembayaran, c.id_siswa, e.tipe_pembayaran, e.id_tipe_pembayaran, g.tahun_ajaran, g.id_tahun_ajaran from detail_pembayaran a 
		// LEFT JOIN pembayaran b on b.id_pembayaran = a.id_pembayaran 
		// LEFT JOIN kelas_siswa_detail f on f.id_kelas_siswa_detail = b.id_kelas_siswa_detail 
		// LEFT JOIN siswa c on c.id_siswa = f.id_siswa 
		// LEFT JOIN setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran 
		// LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran 
		// LEFT JOIN tahun_ajaran g ON g.id_tahun_ajaran = d.id_tahun_ajaran
		// WHERE c.nis = '$nis' and d.id_tipe_pembayaran = '$id_tipe_pembayaran' AND b.id_tahun_ajaran = '$id_tahun_ajaran'");

		$sql1 = $this->db->query("SELECT * FROM setting_pembayaran 
		LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = setting_pembayaran.id_tahun_ajaran
		LEFT JOIN tipe_pembayaran ON tipe_pembayaran.id_tipe_pembayaran = setting_pembayaran.id_tipe_pembayaran
		LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = setting_pembayaran.id_unit_pendidikan
		WHERE unit_pendidikan.id_unit_pendidikan = '$id_unit_pendidikan'
		AND tipe_pembayaran.id_tipe_pembayaran = '$id_tipe_pembayaran'
		AND setting_pembayaran.id_tahun_ajaran = '$id_tahun_ajaran'
		ORDER BY setting_pembayaran.id_setting_pembayaran ASC");

		$data['userdata']	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Riwayat Pembayaran";
		$data['judul'] 		= "Riwayat Pembayaran";
		$data['deskripsi'] 	= "Manage Data Riwayat Pembayaran";
		$data['detail_pembayaran'] 	= $sql->result_array();
		// $data['detail_pembayaran1'] = $this->M_riwayat_pembayaran->select_all_setting_bayar1($nis, $id_unit_pendidikan);
		$data['detail_pembayaran1'] 	= $sql1->result_array();

		$data['siswa'] 		= $this->M_riwayat_pembayaran->select_all_detail_siswa1($nis);
		$this->template->views('riwayat_pembayaran/view_pembayaran', $data);
	}

	public function hapus_detail_pembayaran($id, $nis, $tipe_pembayaran, $id_tahun_ajaran, $unit_pendidikan, $id_tipe_pembayaran)
	{
		$db = $this->db->get_where('detail_pembayaran', ['id_detail_pembayaran' => $id])->row_array();
		$db_pembayaran = $this->db->get_where('pembayaran', ['id_pembayaran' => $db['id_pembayaran']])->row_array();
		$this->db->delete('detail_pembayaran', ['id_detail_pembayaran' => $id]);
		// $this->db->delete('pembayaran', ['id_pembayaran' => $db['id_pembayaran']]);
		// var_dump($db);
		// var_dump($db_pembayaran);
		// die;
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('riwayat_pembayaran/view_pembayaran/' . $nis . '/' . $tipe_pembayaran . '/' . $id_tahun_ajaran . '/' . $unit_pendidikan . '/' . $id_tipe_pembayaran);
	}
}
