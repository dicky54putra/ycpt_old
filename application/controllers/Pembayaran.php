<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_pembayaran');
	}

	public function index()
	{

		$data['userdata']		= $this->userdata;
		$id 					= $this->userdata->id_user;
		$data['page'] 			= "Pembayaran";
		$data['judul'] 			= "Pembayaran";
		$data['deskripsi'] 		= "Manage Pembayaran";
		$data['kelas'] 			= $this->M_pembayaran->select_all_kelas_siswa($id);
		$this->template->views('pembayaran/index', $data);


		// $data['userdata'] 	= $this->userdata;
		// $id 					= $this->userdata->id_user;
		// $data['page'] 		= "Pembayaran";
		// $data['judul'] 		= "Pembayaran";
		// $data['deskripsi'] 	= "Manage Data Pembayaran";
		// $data['pembayaran'] = $this->M_pembayaran->select_all_pembayaran($id);
		// $this->template->views('pembayaran/index', $data);

	}

	function filter()
	{

		$data['userdata']		= $this->userdata;
		$id 					= $this->userdata->id_user;
		$id_kelas_siswa 		= $this->input->post('id_kelas_siswa');
		$data['page'] 			= "Pembayaran";
		$data['judul'] 			= "Pembayaran";
		$data['deskripsi'] 		= "Manage Pembayaran";
		$data['kelas'] 			= $this->M_pembayaran->select_all_kelas_siswa($id);
		$data['siswa'] 			= $this->M_pembayaran->select_all_kelas_siswa_detail($id_kelas_siswa);
		$this->template->views('pembayaran/filter', $data);
	}

	public function add($id_kelas_siswa_detail)
	{

		$data['userdata']		= $this->userdata;
		$id 					= $this->userdata->id_user;
		$id_kelas_siswa_detail	= $id_kelas_siswa_detail;
		$data['page'] 			= "Pembayaran";
		$data['judul'] 			= "Pembayaran";
		$data['deskripsi'] 		= "Manage Pembayaran";
		$data['nomor'] 			= $this->M_pembayaran->select_nomor();
		$data['tahun_ajaran'] 	= $this->M_pembayaran->select_all_tahun_ajaran();
		$data['siswa'] 			= $this->M_pembayaran->select_all_kelas_siswa_detail1($id_kelas_siswa_detail);
		// $data['kelas'] 			= $this->M_pembayaran->select_all_kelas($id);
		$this->template->views('pembayaran/add', $data);
	}

	public function save_satu()
	{

		$data = array(

			'id_pembayaran'			=> $this->input->post('id_pembayaran'),
			'tanggal'				=> $this->input->post('tanggal'),
			'id_tahun_ajaran'		=> $this->input->post('id_tahun_ajaran'),
			'id_kelas_siswa_detail'	=> $this->input->post('id_kelas_siswa_detail')

		);

		$id_pembayaran = $this->input->post('id_pembayaran');
		$this->M_pembayaran->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('pembayaran/detail/' . $id_pembayaran);
	}

	function detail($id_pembayaran)
	{
		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Pembayaran";
		$data['judul'] 		= "Pembayaran";
		$data['deskripsi'] 	= "Manage Data Pembayaran";

		$data['pembayaran'] 		= $this->M_pembayaran->select_all_pembayaran_detail($id_pembayaran);
		foreach ($data['pembayaran'] as $m) {
		}
		// var_dump($m->id_tipe_kelas);
		// die;
		$data['setting_pembayaran'] = $this->M_pembayaran->select_all_setting_pembayaran($id, $m->id_tahun_ajaran,  $m->id_tipe_kelas);
		$data['detail_pembayaran'] 	= $this->M_pembayaran->select_all_detail_pembayaran($id_pembayaran);
		$data['total_pembayaran'] 	= $this->M_pembayaran->select_all_total_pembayaran($id_pembayaran);
		$this->template->views('pembayaran/detail', $data);
	}

	function cetak($id_pembayaran)
	{
		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		// $data['page'] 		= "Pembayaran";
		// $data['judul'] 		= "Data Pembayaran";
		// $data['deskripsi'] 	= "Manage Data Pembayaran";

		$data['user_unit_pendidikan'] 	= $this->M_pembayaran->select_all_pembayaran($id);
		$data['pembayaran'] 			= $this->M_pembayaran->select_all_pembayaran_detail($id_pembayaran);
		$data['detail_pembayaran'] 		= $this->M_pembayaran->select_all_detail_pembayaran($id_pembayaran);
		$data['total_pembayaran'] 		= $this->M_pembayaran->select_all_total_pembayaran($id_pembayaran);

		$this->load->view('pembayaran/cetak', $data);
	}

	public function save_dua()
	{
		$id_setting_pembayaran = $this->input->post('id_setting_pembayaran');
		$nis = $this->input->post('nis');

		$data = array(
			'id_pembayaran'			=> $this->input->post('id_pembayaran'),
			'id_setting_pembayaran'	=> $id_setting_pembayaran,
			'nominal'				=> $this->input->post('nominal')
		);
		$set = $this->db->get_where('setting_pembayaran', ['id_setting_pembayaran' => $id_setting_pembayaran])->row();
		$siswa = $this->db->get_where('siswa', ['nis' => $nis])->row();

		$detail_bayar = $this->db->join('pembayaran', 'pembayaran.id_pembayaran = detail_pembayaran.id_pembayaran', 'LEFT')->join('kelas_siswa_detail', 'kelas_siswa_detail.id_kelas_siswa_detail = pembayaran.id_kelas_siswa_detail', 'LEFT')->where(['id_setting_pembayaran' => $id_setting_pembayaran])->where(['kelas_siswa_detail.id_siswa' => $siswa->id_siswa])->get('detail_pembayaran')->result();

		$total = 0;

		foreach ($detail_bayar as $k) {
			if (!empty($k->nominal)) {
				$total += $k->nominal;
			}
		}

		$kurang = $set->nominal - $total;
		// var_dump($kurang);
		// die;
		$id_pembayaran = $this->input->post('id_pembayaran');
		if ($this->input->post('nominal') <= $kurang) {
			$this->M_pembayaran->insert_detail_pembayaran($data);
			$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		} else {
			$this->session->set_flashdata('msg', show_err_msg('Data Gagal disimpan! nominal melebihi jumlah tagihan yaitu ' . number_format($kurang, '2', ',', '.') . '!'));
		}
		redirect('pembayaran/detail/' . $id_pembayaran);
	}

	public function delete($id_detail_pembayaran, $id_pembayaran)
	{

		$pembayaran = $id_pembayaran;
		$data = array('id_detail_pembayaran' => $id_detail_pembayaran);
		$this->M_pembayaran->delete($data, 'detail_pembayaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('pembayaran/detail/' . $pembayaran);
	}

	public function delete_pembayaran($id_pembayaran)
	{

		$data = array('id_pembayaran' => $id_pembayaran);
		$this->M_pembayaran->delete($data, 'pembayaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('pembayaran/index');
	}
}
