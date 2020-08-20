<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_m');
        $this->load->model('pengajuan_m');
        $this->load->model('pembayaran_m');
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

    public function laporan_pengajuan()
    {
        $data['pengajuan'] = $this->pengajuan_m->getAllPengajuan();

        $this->template->load('template', 'laporan/laporan_pengajuan', $data);
    }

    public function print_pengajuan()
    {
        $data['pengajuan'] = $this->pengajuan_m->getAllPengajuan();
        $data['judul']  = "Periklanan | AboutCirebonID";

        $this->load->view('pengajuan/print_pengajuan', $data);
    }

    public function laporan_pembayaran()
    {
        $data['pembayaran'] = $this->pembayaran_m->getAll();

        $this->template->load('template', 'laporan/laporan_pembayaran', $data);
    }

    public function print_pembayaran()
    {
        $data['pembayaran'] = $this->pembayaran_m->getAll();
        $data['judul']  = "Periklanan | AboutCirebonID";

        $this->load->view('pembayaran/print_pembayaran', $data);
    }
}
