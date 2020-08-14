<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_m');
    }

    public function laporan_pengguna()
    {
        $data['pengguna'] = $this->pengguna_m->get();

        $this->template->load('template', 'laporan/laporan_pengguna', $data);
    }

    public function print_pengguna()
    {
        $data['pengguna'] = $this->pengguna_m->get();
        $data['judul']  = "Periklanan | AboutCirebonID";

        $this->load->view('pengguna/laporan_pengguna', $data);
    }
}
