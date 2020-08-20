<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_rekening');
        if ($id != null) {
            $this->db->where('id_rekening', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $array['nama_bank'] = $post['nama_bank'];
        $array['no_rekening'] = $post['rekening'];
        $array['atas_nama'] = $post['nama'];

        $this->db->insert('tbl_rekening', $array);
    }

    public function edit($post)
    {
        $array['nama_bank'] = $post['nama_bank'];
        $array['no_rekening'] = $post['rekening'];
        $array['atas_nama'] = $post['nama'];

        $this->db->where('id_rekening', $post['id_rekening']);
        $this->db->update('tbl_rekening', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_rekening', $id);
        $this->db->delete('tbl_rekening');
    }
}
