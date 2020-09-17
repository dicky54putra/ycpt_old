<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_pembayaran extends AUTH_Controller {

	public function __construct() 
	{

		parent::__construct();
		$this->load->model('M_tipe_pembayaran');

	}

	public function index() 
	{

		$data['userdata'] 	= $this->userdata;
		$data['tipe_pembayaran'] = $this->M_tipe_pembayaran->select_all_tipe_pembayaran();
		$data['page'] 		= "Tipe Pembayaran";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Tipe Pembayaran";
		$this->template->views('tipe_pembayaran/index', $data);

	}

	public function add() 
	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Tipe Pembayaran";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Tipe Pembayaran";
		$this->template->views('tipe_pembayaran/add', $data);

	}

	public function save()
	{

		$data = array(

			'tipe_pembayaran'	=> $this->input->post('tipe_pembayaran')

		);

		$this->M_tipe_pembayaran->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('tipe_pembayaran/index');

	}

	function edit($id)

	{

		$data['userdata']	= $this->userdata;
		$data['page'] 		= "Tipe Pembayaran";
		$data['judul'] 		= "Data Master";
		$data['deskripsi'] 	= "Manage Data Tipe Pembayaran";

		$where = array('id_tipe_pembayaran' => $id);
		$data['tipe_pembayaran'] = $this->M_tipe_pembayaran->edit_data($where,'tipe_pembayaran')->result();
		$this->template->views('tipe_pembayaran/edit',$data);

	}

	function update()
	{

		$id 			= $this->input->post('id_tipe_pembayaran');
		$tipe_pembayaran 			= $this->input->post('tipe_pembayaran');
		$data = array(

			'tipe_pembayaran' 	=> $tipe_pembayaran

		);

		$where = array(

			'id_tipe_pembayaran' => $id

		);

		$this->M_tipe_pembayaran->update_data($where,$data,'tipe_pembayaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('tipe_pembayaran/index');

	}

	public function delete($id) 
	{

		$data = array('id_tipe_pembayaran' => $id);
		$this->M_tipe_pembayaran->delete($data,'tipe_pembayaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('tipe_pembayaran/index');

	}
}