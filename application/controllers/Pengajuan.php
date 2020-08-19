<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        cek_tidak_login();
        $id = $this->fungsi->user_login()->id_pengguna;
        $level =  $this->fungsi->user_login()->level;
        $data['pengajuan'] = $this->pengajuan_m->getPengajuan($id, $level);
        $data['pengajuan_terima'] = $this->pengajuan_m->getPengajuanTerima();
        $data['pengajuan_tolak'] = $this->pengajuan_m->getPengajuanTolak();

        $this->template->load('template', 'pengajuan/data_pengajuan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('caption', 'Caption', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $dariDB = $this->pengajuan_m->generateKodePengajuan();
            $nourut = substr($dariDB, 3, 4);
            $kodePengajuanSekarang = $nourut + 1;

            $data['kode_pengajuan'] = $kodePengajuanSekarang;
            $data['detail'] = $this->pengajuan_m->detailPaket();

            $this->template->load('template', 'pengajuan/tambah_pengajuan', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengajuan_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
            alert('Data berhasil disimpan');
            window.location='" . site_url('pengajuan') . "';
          </script>";
            }
        }
    }
}
