<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Panduan extends AUTH_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->load->model('M_panduan');
	}

	public function index() 
	{
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "Panduan";
		$data['judul'] 		= "Panduan Sistem";
		$data['deskripsi'] 	= "";
		$this->template->views('panduan/index', $data);
	}
}