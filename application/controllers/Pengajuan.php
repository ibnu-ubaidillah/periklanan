<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_m');
    }

    public function index()
    {
        cek_tidak_login();
        $data['pengajuan'] = $this->pengajuan_m->getPengajuan();

        $this->template->load('template', 'pengajuan/data_pengajuan', $data);
    }
}
