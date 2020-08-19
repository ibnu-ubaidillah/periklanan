<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_paket');
        if ($id != null) {
            $this->db->where('id_paket', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $array['nama_paket'] = $post['nama_paket'];

        $this->db->insert('tbl_paket', $array);
    }

    public function edit($post)
    {
        $array['nama_paket'] = $post['nama_paket'];


        $this->db->where('id_paket', $post['id_paket']);
        $this->db->update('tbl_paket', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_paket', $id);
        $this->db->delete('tbl_paket');
    }
}
