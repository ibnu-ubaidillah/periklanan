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
    $this->form_validation->set_rules('tipe_paket', 'Tipe Paket', 'required');
    $this->form_validation->set_rules('tayang', 'Jumlah Tayang', 'required');
    $this->form_validation->set_rules('harga', 'Harga Paket', 'required');

    $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');

    if ($this->form_validation->run() == FALSE) {

      $data['row'] = $this->paketdetail_m->getPaketUtama();
      $this->template->load('template', 'paket/paket_detail/tambah_data_paket_detail', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $this->paketdetail_m->tambah($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('paket_detail') . "';
        </script>";
      }
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
    $this->form_validation->set_rules('tipe_paket', 'Tipe Paket', 'required');
    $this->form_validation->set_rules('tayang', 'Jumlah Tayang', 'required');
    $this->form_validation->set_rules('harga', 'Harga Paket', 'required');

    $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');
    $data['paket'] = $this->paketdetail_m->getPaketUtama();
    if ($this->form_validation->run() == FALSE) {
      $query = $this->paketdetail_m->get($id);
      if ($query->num_rows() > 0) {
        $data['row'] = $query->row();
        $this->template->load('template', 'paket/paket_detail/edit_data_paket_detail', $data);
      } else {
        echo "<script>
            alert('Data tidak ditemukan!');
            window.location='" . site_url('paket') . "';
          </script>";
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->paketdetail_m->edit($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('paket_detail') . "';
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
