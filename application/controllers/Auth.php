<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_m');
        $this->load->library('form_validation');
    }

    public function login()
    {
        cek_login();
        $data['title'] = "About Cirebon | Login Akun";
        $this->load->view('login', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $query = $this->pengguna_m->login($post);

            if ($query->num_rows() > 0) {
                $row = $query->row();

                $params = array(
                    'userid' => $row->id_pengguna,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script> 
                        alert('Selamat, login berhasil!');
                        window.location='" . site_url('dashboard') . "';
                     </script>";
            } else {
                echo "<script> 
                        alert('Login gagal, silahkan coba lagi!');
                        window.location='" . site_url('auth/login') . "';
                     </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        echo "<script> 
                alert('Berhasil logout!');
                 window.location='" . base_url() . "';
            </script>";
    }

    public function daftar()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_pengguna.username]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[tbl_pengguna.email]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|max_length[15]');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

        $this->form_validation->set_message('required', '%s masih kosong!, silahkan isi kembali');
        $this->form_validation->set_message('min_length[3]', '{field} minimal 3 karakter!');
        $this->form_validation->set_message('min_length[5]', '{field} minimal 5 karakter!');
        $this->form_validation->set_message('max_length', '{field} maksimal 15 angka!');
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai, silahkan ganti!');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = "About Cirebon | Pendaftaran Akun";
            $this->load->view('pendaftaran', $data);
        } else {

            $this->proses_daftar();
        }
    }

    public function proses_daftar()
    {
        $post = $this->input->post(null, TRUE);

        $array['username'] = $post['username'];
        $array['password'] = sha1($post['password']);
        $array['email'] = $post['email'];
        $array['nama'] = $post['nama'];
        $array['alamat'] = $post['alamat'];
        $array['no_telp'] = $post['no_hp'];
        $array['jenis_kelamin'] = $post['jk'];
        $array['level'] = 3;
        $array['aktif'] = 1;

        $this->db->insert('tbl_pengguna', $array);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Akun anda berhasil dibuat, silahkan login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('auth/login');
    }
}
