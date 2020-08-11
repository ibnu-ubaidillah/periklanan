<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    cek_tidak_login();
    $this->load->model('pengguna_m');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['row'] = $this->pengguna_m->get();

    $this->template->load('template', 'pengguna/data_pengguna', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_pengguna.username]');
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|max_length[15]');
    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');
    $this->form_validation->set_message('min_length[3]', '{field} minimal 3 karakter!');
    $this->form_validation->set_message('min_length[5]', '{field} minimal 5 karakter!');
    $this->form_validation->set_message('max_length', '{field} maksimal 15 angka!');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti!');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'pengguna/tambah_data_pengguna');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->pengguna_m->tambah($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
          alert('Data berhasil disimpan');
          window.location='" . site_url('pengguna') . "';
        </script>";
      }
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]');
    if ($this->input->post('password')) {
      $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
    }
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|max_length[15]');
    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');
    $this->form_validation->set_message('min_length[3]', '{field} minimal 3 karakter!');
    $this->form_validation->set_message('min_length[5]', '{field} minimal 5 karakter!');
    $this->form_validation->set_message('max_length', '{field} maksimal 15 angka!');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti!');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->pengguna_m->get($id);
      if ($query->num_rows() > 0) {
        $data['row'] = $query->row();
        $this->template->load('template', 'pengguna/edit_data_pengguna', $data);
      } else {
        echo "<script>
            alert('Data tidak ditemukan!');
            window.location='" . site_url('pengguna') . "';
          </script>";
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->pengguna_m->edit($post);

      if ($this->db->affected_rows() > 0) {
        echo "<script>
            alert('Data berhasil diedit');
            window.location='" . site_url('pengguna') . "';
          </script>";
      }
    }
  }

  public function hapus()
  {
    $id = $this->input->post('id_pengguna');
    $this->pengguna_m->hapus($id);

    if ($this->db->affected_rows() > 0) {
      echo "<script>
          alert('Data berhasil dihapus');
          window.location='" . site_url('pengguna') . "';
        </script>";
    }
  }

  public function username_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM tbl_pengguna WHERE username ='$post[username]' AND id_pengguna != '$post[id_pengguna]' ");

    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', '{field} ini sudah terpakai');
      return FALSE;
    } else {
      return TRUE;
    }
  }
}
