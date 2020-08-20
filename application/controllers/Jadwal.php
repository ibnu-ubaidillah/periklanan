<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_tidak_login();
        $this->load->model('jadwal_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->jadwal_m->get();
        $this->template->load('template', 'jadwal/data_jadwal', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $data['pembayaran'] = $this->jadwal_m->getPembayaran();
            $this->template->load('template', 'jadwal/tambah_jadwal', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->jadwal_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil disimpan');
                window.location='" . site_url('jadwal') . "';
                </script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $data['pembayaran'] = $this->jadwal_m->getPembayaran();
            $query = $this->jadwal_m->getAll($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'jadwal/edit_jadwal', $data);
            } else {
                echo "<script>
                  alert('Data tidak ditemukan!');
                  window.location='" . site_url('jadwal') . "';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->jadwal_m->edit($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil disimpan');
                window.location='" . site_url('jadwal') . "';
                </script>";
            }
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id_jadwal');

        $this->jadwal_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
          alert('Data berhasil dihapus');
          window.location='" . site_url('jadwal') . "';
        </script>";
        }
    }
}
