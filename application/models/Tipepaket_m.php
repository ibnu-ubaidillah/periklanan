<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipepaket_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_tipepaket');
        if ($id != null) {
            $this->db->where('id_tipepaket', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $array['tipe_paket'] = $post['kategori'];

        $this->db->insert('tbl_tipepaket', $array);
    }

    public function edit($post)
    {
        $array['tipe_paket'] = $post['kategori'];


        $this->db->where('id_tipepaket', $post['id_tipepaket']);
        $this->db->update('tbl_tipepaket', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_tipepaket', $id);
        $this->db->delete('tbl_tipepaket');
    }
}
