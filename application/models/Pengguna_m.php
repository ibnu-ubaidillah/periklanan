<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengguna');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();

        return $query;
    }

    public function get($id = null)
    {

        $this->db->from('tbl_pengguna');
        if ($id != null) {
            $this->db->where('id_pengguna', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $array['nama'] = $post['nama'];
        $array['username'] = $post['username'];
        $array['password'] = sha1($post['password']);
        $array['email'] = $post['email'];
        $array['alamat'] = $post['alamat'];
        $array['jenis_kelamin'] = $post['jk'];
        $array['no_telp'] = $post['no_hp'];
        $array['level'] = $post['level'];

        $this->db->insert('tbl_pengguna', $array);
    }

    public function edit($post)
    {
        $array['nama'] = $post['nama'];
        $array['username'] = $post['username'];
        if (!empty($post['password'])) {
            $array['password'] = sha1($post['password']);
        }
        $array['email'] = $post['email'];
        $array['alamat'] = $post['alamat'];
        $array['jenis_kelamin'] = $post['jk'];
        $array['no_telp'] = $post['no_hp'];
        $array['level'] = $post['level'];

        $this->db->where('id_pengguna', $post['id_pengguna']);
        $this->db->update('tbl_pengguna', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_pengguna', $id);
        $this->db->delete('tbl_pengguna');
    }
}
