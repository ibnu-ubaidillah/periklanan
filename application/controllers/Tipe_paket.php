<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_paket extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_tidak_login();
        $this->load->model('tipepaket_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->tipepaket_m->get();
        $this->template->load('template', 'paket/tipe_paket/data_tipe', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'paket/tipe_paket/tambah_tipe');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->tipepaket_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('tipe_paket') . "';
        </script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('kategori', 'Kategori Paket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->tipepaket_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'paket/tipe_paket/edit_tipe', $data);
            } else {
                echo "<script>
            alert('Data tidak ditemukan!');
            window.location='" . site_url('tipe_paket') . "';
          </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->tipepaket_m->edit($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('tipe_paket') . "';
        </script>";
            }
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id_tipepaket');

        $this->tipepaket_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
          alert('Data berhasil dihapus');
          window.location='" . site_url('tipe_paket') . "';
        </script>";
        }
    }
}
