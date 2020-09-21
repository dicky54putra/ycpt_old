<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_kelas extends AUTH_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('M_tipe_kelas');
    }

    public function index()
    {

        $data['userdata']     = $this->userdata;
        $data['tipe_kelas']     = $this->M_tipe_kelas->select_all_tipe_kelas();
        $data['page']         = "Tipe Kelas";
        $data['judul']         = "Data Master";
        $data['deskripsi']     = "Manage Data Tipe Kelas";
        $this->template->views('tipe_kelas/index', $data);
    }

    public function add()
    {

        $data['userdata']    = $this->userdata;
        $data['page']         = "Tipe Kelas";
        $data['judul']         = "Data Master";
        $data['deskripsi']     = "Manage Data Tipe Kelas";
        $this->template->views('tipe_kelas/add', $data);
    }


    public function save()
    {

        $data = array(

            'nama_tipe_kelas'    => $this->input->post('tipe_kelas'),

        );

        $this->M_tipe_kelas->insert($data);
        $this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
        redirect('tipe_kelas/index');
    }

    function edit($id)

    {

        $data['userdata']    = $this->userdata;
        $data['page']         = "Tipe Kelas";
        $data['judul']         = "Data Master";
        $data['deskripsi']     = "Manage Data Tipe Kelas";

        $where = array('id_tipe_kelas' => $id);
        $data['tipe_kelas'] = $this->M_tipe_kelas->edit_data($where, 'tipe_kelas')->result();
        $this->template->views('tipe_kelas/edit', $data);
    }

    function update()
    {

        $id                 = $this->input->post('id_tipe_kelas');
        $tipe_kelas     = $this->input->post('tipe_kelas');

        $data = array(

            'nama_tipe_kelas'             => $tipe_kelas,

        );

        $where = array(

            'id_tipe_kelas' => $id

        );

        $this->M_tipe_kelas->update_data($where, $data, 'tipe_kelas');
        $this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
        redirect('tipe_kelas/index');
    }

    public function delete($id)
    {

        $data = array('id_tipe_kelas' => $id);
        $this->M_tipe_kelas->delete($data, 'tipe_kelas');
        $this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
        redirect('tipe_kelas/index');
    }
}
