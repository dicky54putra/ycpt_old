<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_pendaftaran');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Pendaftaran";
		$data['judul'] 		= "PPDB";
		$data['deskripsi'] 	= "Manage Data Pendaftaran";
		$data['unit_pendidikan'] = $this->M_pendaftaran->select_all_unit_pendidikan($id);
		$data['pendaftaran']= $this->M_pendaftaran->select_all_pendaftaran($id);
		$this->template->views('pendaftaran/index', $data);

	}

	public function add() 
	{

		$data['userdata']	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Pendaftaran";
		$data['judul'] 		= "PPDB";
		$data['deskripsi'] 	= "Manage Data Pendaftaran";
		$data['kodeunik']	= $this->M_pendaftaran->buat_kode();
		$data['unit_pendidikan'] 	= $this->M_pendaftaran->select_all_unit_pendidikan($id);
		$data['tahun_ajaran'] 		= $this->M_pendaftaran->select_all_tahun_ajaran();
		$this->template->views('pendaftaran/add', $data);

	}

	public function save()
	{

		$data = array(

			'id_tahun_ajaran'	=> $this->input->post('id_tahun_ajaran'),
			'nomor_daftar'		=> $this->input->post('nomor_daftar'),
			'tanggal_daftar'	=> $this->input->post('tanggal_daftar'),
			'nama_lengkap'		=> $this->input->post('nama_lengkap'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
			'nama_ortu'			=> $this->input->post('nama_ortu'),
			'alamat'			=> $this->input->post('alamat'),
			'sekolah_asal'		=> $this->input->post('sekolah_asal'),
			'id_unit_pendidikan'=> $this->input->post('id_unit_pendidikan'),
			'status'			=> $this->input->post('status')

		);

		$this->M_pendaftaran->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('pendaftaran/index');

	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Pendaftaran";
		$data['judul'] 		= "PPDB";
		$data['deskripsi'] 	= "Manage Data Pendaftaran";

		$where 				= array('id_daftar' => $id);
		$data['pendaftaran']= $this->M_pendaftaran->edit_data($where,'pendaftaran')->result();
		$this->template->views('pendaftaran/edit',$data);

	}

	function update()
	{

		$id 				= $this->input->post('id_daftar');
		$nomor_daftar 		= $this->input->post('nomor_daftar');
		$tanggal_daftar 	= $this->input->post('tanggal_daftar');
		$nama_lengkap 		= $this->input->post('nama_lengkap');
		$tempat_lahir 		= $this->input->post('tempat_lahir');
		$tanggal_lahir 		= $this->input->post('tanggal_lahir');
		$nama_ortu 			= $this->input->post('nama_ortu');
		$alamat				= $this->input->post('alamat');
		$sekolah_asal		= $this->input->post('sekolah_asal');
		$status				= $this->input->post('status');
		$id_unit_pendidikan	= $this->input->post('id_unit_pendidikan');

		$data = array(

			'nomor_daftar' 			=> $nomor_daftar,
			'tanggal_daftar' 		=> $tanggal_daftar,
			'nama_lengkap' 			=> $nama_lengkap,
			'tempat_lahir' 			=> $tempat_lahir,
			'tanggal_lahir' 		=> $tanggal_lahir,
			'nama_ortu' 			=> $nama_ortu,
			'alamat' 				=> $alamat,
			'sekolah_asal' 			=> $sekolah_asal,
			'status' 				=> $status,
			'id_unit_pendidikan' 	=> $id_unit_pendidikan

		);

		$where = array(

			'id_daftar' => $id

		);

		$this->M_pendaftaran->update_data($where,$data,'pendaftaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('pendaftaran/index');

	}

	function status_pendding($id)
	{

		$status 					= 'Pending';

		$data = array(

			'status' 				=> $status

		);

		$where = array(

			'id_daftar' => $id

		);

		$this->M_pendaftaran->update_data($where,$data,'pendaftaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('pendaftaran/index');

	}

	function status_cancel($id)
	{

		$status 					= 'Cancel';

		$data = array(

			'status' 				=> $status

		);

		$where = array(

			'id_daftar' => $id

		);

		$this->M_pendaftaran->update_data($where,$data,'pendaftaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('pendaftaran/index');

	}

	function status_approved($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Pendaftaran";
		$data['judul'] 		= "PPDB";
		$data['deskripsi'] 	= "Manage Data Pendaftaran";

		$where 				= array('id_daftar' => $id);
		$data['pendaftaran']= $this->M_pendaftaran->edit_data($where,'pendaftaran')->result();
		$this->template->views('pendaftaran/status_approved',$data);

	}

	function save_status_approved()
	{

		$id 					= $this->input->post('id_daftar');
		$status 				= 'Approved';

		$data = array(

			'status' 			=> $status

		);

		$data_siswa = array(

			'id_tahun_ajaran'	=> $this->input->post('id_tahun_ajaran'),
			'nis'				=> $this->input->post('nis'),
			'nama_siswa'		=> $this->input->post('nama_siswa'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
			'nama_ortu'			=> $this->input->post('nama_ortu'),
			'alamat'			=> $this->input->post('alamat'),
			'id_unit_pendidikan'=> $this->input->post('id_unit_pendidikan'),
			'status'			=> $this->input->post('status')

		);

		$where = array(

			'id_daftar' => $id

		);

		$this->M_pendaftaran->update_data($where,$data,'pendaftaran');
		$this->M_pendaftaran->insert_siswa($data_siswa);


		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('pendaftaran/index');

	}

	public function delete($id) 
	{

		$data = array('id_daftar' => $id);
		$this->M_pendaftaran->delete($data,'pendaftaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('pendaftaran/index');

	}
}