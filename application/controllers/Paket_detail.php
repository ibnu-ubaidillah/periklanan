<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_detail extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    cek_tidak_login();
    $this->load->model('paketdetail_m');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['row'] = $this->paketdetail_m->joinPaket();
    $this->template->load('template', 'paket/paket_detail/data_paket_detail', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'paket/paket_utama/tambah_data_paket');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->paket_m->tambah($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('paket') . "';
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
            window.location='" . site_url('paket') . "';
          </script>";
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->paket_m->edit($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('paket') . "';
        </script>";
      }
    }
  }

  public function hapus()
  {
    $id = $this->input->post('id_detail');

    $this->paketdetail_m->hapus($id);
    if ($this->db->affected_rows() > 0) {
      echo "<script>
          alert('Data berhasil dihapus');
          window.location='" . site_url('paket_detail') . "';
        </script>";
    }
  }
}
