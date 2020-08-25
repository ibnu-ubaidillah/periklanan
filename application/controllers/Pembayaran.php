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

        $this->template->load('template', 'pembayaran/data_pembayaran', $data);
    }

    public function tambah($id)
    {
        $this->form_validation->set_rules('id_rekening', 'Daftar Rekening', 'required');
        $this->form_validation->set_rules('id_pengajuan', 'Data Pengajuan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan diisi');

        if ($this->form_validation->run() == FALSE) {
            $dariDB = $this->pembayaran_m->generateKodePembayaran();
            $nourut = substr($dariDB, 3, 4);
            $kodePembayaranSekarang = $nourut + 1;

            $data['kode_pembayaran'] = $kodePembayaranSekarang;
            $data['pengajuan'] = $this->pembayaran_m->getAllPengajuanById($id);
            $data['rekening'] = $this->pembayaran_m->getAllRekening();
            $this->template->load('template', 'pembayaran/tambah_pembayaran', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pembayaran_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil disimpan');
                window.location='" . base_url('pembayaran') . "';
              </script>";
            }
        }
    }

    public function invoice($id)
    {
        $data['pembayaran'] = $this->pembayaran_m->getAllPembayaran($id);
        $data['invoice'] = $this->pembayaran_m->getInvoice();
        $this->template->load('template', 'pembayaran/invoice', $data);

        $post = $this->input->post(null, TRUE);

        $config['upload_path']          = './uploads/bukti_pembayaran/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'bukti-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);
        $config['overwrite']            = true;
        $config['max_width']            = 2048;
        $config['max_height']           = 1000;

        $this->load->library('upload', $config);

        if (@$_FILES['bukti_pembayaran']['name'] != null) {
            if ($this->upload->do_upload('bukti_pembayaran')) {
                $post['bukti_pembayaran'] = $this->upload->data("file_name");
                $this->pembayaran_m->updateBukti($post);
            }
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                    alert('Pembayaran berhasil');
                    window.location='" . site_url('pembayaran') . "';
                  </script>";
            }
        }
    }

    public function detail($id)
    {
        $data['pembayaran'] = $this->pembayaran_m->getAllPembayaran($id);
        $this->template->load('template', 'pembayaran/detail_pembayaran', $data);
    }
}
