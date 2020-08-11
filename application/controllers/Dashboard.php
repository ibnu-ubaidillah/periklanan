<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_m');
	}

	public function index()
	{
		cek_tidak_login();
		$data['total_paket'] = $this->dashboard_m->getPaket();
		$data['total_pengguna'] = $this->dashboard_m->getPengguna();
		$this->template->load('template', 'dashboard', $data);
	}
}
