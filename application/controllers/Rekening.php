<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        cek_tidak_login();
        $this->load->model('rekening_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->rekening_m->get();
        $this->template->load('template', 'rekening/data_rekening', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama', 'Atas Nama', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'rekening/tambah_rekening');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->rekening_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('rekening') . "';
        </script>";
            }
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama', 'Atas Nama', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->rekening_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'rekening/edit_rekening', $data);
            } else {
                echo "<script>
            alert('Data tidak ditemukan!');
            window.location='" . site_url('rekening') . "';
          </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->rekening_m->edit($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('rekening') . "';
        </script>";
            }
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id_rekening');

        $this->rekening_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>
          alert('Data berhasil dihapus');
          window.location='" . site_url('rekening') . "';
        </script>";
        }
    }
}
