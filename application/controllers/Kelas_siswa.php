<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_siswa extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_kelas_siswa');
	}

	public function index()
	{

		$data['userdata'] 		= $this->userdata;
		$id 					= $this->userdata->id_user;
		$data['page'] 			= "Kelas Siswa";
		$data['judul'] 			= "Data Master";
		$data['deskripsi'] 		= "Manage Data Kelas Siswa";
		$data['kelas_siswa']	= $this->M_kelas_siswa->select_all_kelas_siswa($id);
		// $data['jumlah_siswa']	= $this->M_kelas_siswa->select_jumlah_siswa($id);
		$this->template->views('kelas_siswa/index', $data);
	}

	public function index_kelas_siswa()
	{

		$data['userdata'] 	= $this->userdata;
		// $id 				= $this->userdata->id_user;
		$data['page'] 		= "Kelas Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Kelas Siswa";
		$data['unit_pendidikan'] = $this->M_kelas_siswa->select_unit_pendidikan();
		$this->template->views('kelas_siswa/index_kelas_siswa', $data);
	}

	public function kelas_siswa_detail($id)
	{

		$data['userdata'] 		= $this->userdata;
		// $id 					= $this->userdata->id_user;
		$data['page'] 			= "Kelas Siswa";
		$data['judul'] 			= "Data Master";
		$data['deskripsi'] 		= "Manage Data Kelas Siswa";
		$data['kelas_siswa']	= $this->M_kelas_siswa->select_kelas_siswa($id);
		$data['unit_pendidikan'] = $this->M_kelas_siswa->select_unit_pendidikan_siswa($id);
		// $data['jumlah_siswa']	= $this->M_kelas_siswa->select_jumlah_siswa($id);
		$this->template->views('kelas_siswa/detail_kelas_siswa', $data);
	}

	public function add()
	{

		$data['userdata']			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$data['page'] 				= "Kelas Siswa";
		$data['judul'] 				= "Data Master";
		$data['deskripsi'] 			= "Manage Data Kelas Siswa";
		$data['tahun_ajaran'] 		= $this->M_kelas_siswa->select_all_tahun_ajaran();
		$data['kelas'] 				= $this->M_kelas_siswa->select_all_kelas($id);
		$data['unit_pendidikan'] 	= $this->M_kelas_siswa->select_all_unit_pendidikan($id);
		$this->template->views('kelas_siswa/add', $data);
	}

	public function save()
	{

		$data = array(

			'id_tahun_ajaran'	=> $this->input->post('id_tahun_ajaran'),
			'id_kelas'			=> $this->input->post('id_kelas'),
			'id_unit_pendidikan' => $this->input->post('id_unit_pendidikan')

		);

		$this->M_kelas_siswa->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('kelas_siswa/index');
	}

	function edit($id)

	{

		$data['userdata']		= $this->userdata;
		$id_user 				= $this->userdata->id_user;
		$data['page'] 			= "Kelas Siswa";
		$data['judul'] 			= "Data Master";
		$data['deskripsi'] 		= "Manage Data Kelas Siswa";

		$where 					= array('id_kelas_siswa' => $id);
		$data['tahun_ajaran'] 	= $this->M_kelas_siswa->select_all_tahun_ajaran();
		$data['kelas'] 			= $this->M_kelas_siswa->select_all_kelas1($id_user);
		$data['kelas_siswa'] 	= $this->M_kelas_siswa->edit_data($where, 'kelas_siswa')->result();
		$this->template->views('kelas_siswa/edit', $data);
	}

	function update()
	{

		$id 				= $this->input->post('id_kelas_siswa');
		$id_tahun_ajaran 	= $this->input->post('id_tahun_ajaran');
		$id_kelas 			= $this->input->post('id_kelas');
		$id_unit_pendidikan = $this->input->post('id_unit_pendidikan');

		$data = array(

			'id_tahun_ajaran' 		=> $id_tahun_ajaran,
			'id_kelas' 				=> $id_kelas,
			'id_unit_pendidikan' 	=> $id_unit_pendidikan

		);

		$where = array(

			'id_kelas_siswa' => $id

		);

		$this->M_kelas_siswa->update_data($where, $data, 'kelas_siswa');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('kelas_siswa/index');
	}

	function detail($id)
	{
		$data['userdata']	= $this->userdata;
		$id_user 			= $this->userdata->id_user;
		$data['page'] 		= "Kelas Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Kelas Siswa";

		$data['kelas'] 		= $this->M_kelas_siswa->select_all_kelas_siswa1($id);
		foreach ($data['kelas'] as $kls) {
		}
		// echo $kls->id_tahun_ajaran;
		// die;
		$data['siswa'] 		= $this->M_kelas_siswa->select_all_siswa_add($id_user, $id, $kls->id_tahun_ajaran);
		$data['kelas_siswa'] = $this->M_kelas_siswa->select_all_kelas_siswa_detail($id);
		$this->template->views('kelas_siswa/detail', $data);
	}

	function detail_siswa($id)
	{
		$data['userdata']	= $this->userdata;
		// $id_user 			= $this->userdata->id_user;
		$data['page'] 		= "Kelas Siswa";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Kelas Siswa";

		$data['kelas'] 		= $this->M_kelas_siswa->select_all_kelas_siswa1($id);
		// $data['siswa'] 		= $this->M_kelas_siswa->select_all_siswa($id_user);
		$data['kelas_siswa'] = $this->M_kelas_siswa->select_all_kelas_siswa_detail($id);
		$this->template->views('kelas_siswa/detail_siswa', $data);
	}

	public function save_siswa()
	{
		$id 				= $this->input->post('id_kelas_siswa');
		$data = array(
			'id_kelas_siswa' => $this->input->post('id_kelas_siswa'),
			'id_siswa'		=> $this->input->post('id_siswa')
		);


		$this->db->update('siswa', ['id_kelas_siswa' => $id], ['id_siswa' => $this->input->post('id_siswa')]);
		$this->M_kelas_siswa->insert_siswa($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('kelas_siswa/detail/' . $id);
	}

	public function delete_siswa($id_kelas_siswa_detail, $id_kelas_siswa)
	{

		$kelas 	= $id_kelas_siswa;
		$data 	= array('id_kelas_siswa_detail' => $id_kelas_siswa_detail);
		$siswa = $this->db->get_where('siswa', ['id_kelas_siswa' => $id_kelas_siswa])->row();
		// echo $siswa->id_siswa;
		// die;
		$this->db->update('siswa', ['id_kelas_siswa' => 0], ['id_siswa' => $siswa->id_siswa]);
		$this->M_kelas_siswa->delete($data, 'kelas_siswa_detail');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('kelas_siswa/detail/' . $kelas);
	}

	public function delete($id)
	{

		$data = array('id_kelas_siswa' => $id);
		$this->M_kelas_siswa->delete($data, 'kelas_siswa');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('kelas_siswa/index');
	}
}
