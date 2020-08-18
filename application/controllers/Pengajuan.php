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
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|max_length[15]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $dariDB = $this->pengajuan_m->generateKodePengajuan();
            $nourut = substr($dariDB, 3, 4);
            $kodePengajuanSekarang = $nourut + 1;

            $data['kode_pengajuan'] = $kodePengajuanSekarang;
            $data['paket'] = $this->pengajuan_m->getPaket();
            $this->template->load('template', 'pengajuan/tambah_pengajuan', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengguna_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
            alert('Data berhasil disimpan');
            window.location='" . site_url('pengajuan') . "';
          </script>";
            }
        }
    }

    public function getDetailPaket()
    {
        $id = $this->input->post('id');
        $data = $this->pengajuan_m->getDetailPaket($id);
        echo json_encode($data);
    }

    public function getJmlTayang()
    {
        $id = $this->input->post('id');
        $data = $this->pengajuan_m->getJmlTayang($id);
        echo json_encode($data);
    }
}
