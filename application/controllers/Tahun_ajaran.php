<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_tahun_ajaran');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_all_tahun_ajaran();
		$data['page'] 		= "Tahun Ajaran";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Tahun Ajaran";
		$this->template->views('tahun_ajaran/index', $data);

	}

	public function add() 
	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Tahun Ajaran";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Tahun Ajaran";
		$this->template->views('tahun_ajaran/add', $data);

	}

	public function save()
	{

		$data = array(

			'tahun_ajaran'	=> $this->input->post('tahun_ajaran')

		);

		$this->M_tahun_ajaran->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('tahun_ajaran/index');

	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Tahun Ajaran";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Tahun Ajaran";

		$where = array('id_tahun_ajaran' => $id);
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->edit_data($where,'tahun_ajaran')->result();
		$this->template->views('tahun_ajaran/edit',$data);

	}

	function update()
	{

		$id 			= $this->input->post('id_tahun_ajaran');
		$tahun_ajaran 			= $this->input->post('tahun_ajaran');
		$data = array(

			'tahun_ajaran' 	=> $tahun_ajaran

		);

		$where = array(

			'id_tahun_ajaran' => $id

		);

		$this->M_tahun_ajaran->update_data($where,$data,'tahun_ajaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('tahun_ajaran/index');

	}

	public function delete($id) 
	{

		$data = array('id_tahun_ajaran' => $id);
		$this->M_tahun_ajaran->delete($data,'tahun_ajaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('tahun_ajaran/index');

	}
}