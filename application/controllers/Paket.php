<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

  function __construct() 
  {
    parent::__construct();
    cek_tidak_login();
    $this->load->model('paket_m');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['row'] = $this->paket_m->get();
    $this->template->load('template', 'paket/paket_utama/data_paket', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'paket/paket_utama/tambah_data_paket');

    } else {
      $post = $this->input->post(null, TRUE);
      $this->paket_m->tambah($post);

      if ($this->db->affected_rows() > 0)
      {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='".site_url('paket')."';
        </script>";
      }
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->paket_m->get($id);
        if ($query->num_rows() > 0) {
          $data['row'] = $query->row();
          $this->template->load('template', 'paket/paket_utama/edit_data_paket', $data);
        } else {
          echo "<script>
            alert('Data tidak ditemukan!');
            window.location='".site_url('paket')."';
          </script>";
        }

    } else {
      $post = $this->input->post(null, TRUE);
      $this->paket_m->edit($post);

      if ($this->db->affected_rows() > 0)
      {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='".site_url('paket')."';
        </script>";
      }
    }
  }

  public function hapus()
  {
    $id = $this->input->post('id_paket');

      $this->paket_m->hapus($id);
      if ($this->db->affected_rows() > 0)
      {
        echo "<script>
          alert('Data berhasil dihapus');
          window.location='".site_url('paket')."';
        </script>";
      }
  }
}