<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        cek_tidak_login();

        $id = $this->fungsi->user_login()->id_pengguna;
        $level =  $this->fungsi->user_login()->level;

        $data['pembayaran'] = $this->pembayaran_m->getPembayaranPending($id, $level);
        $data['pembayaran_terima'] = $this->pembayaran_m->getPembayaranTerima($id, $level);
        $data['pembayaran_tolak'] = $this->pembayaran_m->getPembayaranTolak($id, $level);

        $this->template->load('template', 'pembayaran/data_pembayaran', $data);
    }

    public function tambah($id)
    {
        $this->form_validation->set_rules('caption', 'Caption', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $dariDB = $this->pembayaran_m->generateKodePembayaran();
            $nourut = substr($dariDB, 3, 4);
            $kodePembayaranSekarang = $nourut + 1;

            $data['kode_pembayaran'] = $kodePembayaranSekarang;
            $data['pembayaran'] = $this->pembayaran_m->getAllPembayaran($id);

            $this->template->load('template', 'pengajuan/tambah_pembayaran', $data);
        } else {

            $post = $this->input->post(null, TRUE);

            $config['upload_path']          = './uploads/konten/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = 'konten-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);
            $config['overwrite']            = true;
            $config['max_width']            = 2048;
            $config['max_height']           = 1000;

            $this->load->library('upload', $config);

            if (@$_FILES['konten']['name'] != null) {

                if ($this->upload->do_upload('konten')) {
                    $post['konten'] = $this->upload->data("file_name");
                    $this->pengajuan_m->tambah($post);
                }
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                alert('Data berhasil disimpan');
                window.location='" . site_url('pengajuan') . "';
              </script>";
                }
            }
        }
    }

    public function detail($id)
    {
        $data['pengajuan'] = $this->pengajuan_m->getDetailPengajuan($id);
        $this->template->load('template', 'pengajuan/detail_pengajuan', $data);
    }

    public function respon($id)
    {
        $this->form_validation->set_rules('alasan', 'Keterangan', 'required');
        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $data['pengajuan'] = $this->pengajuan_m->getDetailPengajuan($id);
            $this->template->load('template', 'pengajuan/respon_pengajuan', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pengajuan_m->respon($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Respon berhasil');
                window.location='" . site_url('pengajuan') . "';
              </script>";
            }
        }
    }
}
