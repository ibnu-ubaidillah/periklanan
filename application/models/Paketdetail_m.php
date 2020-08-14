<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paketdetail_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_detailpaket');
        if ($id != null) {
            $this->db->where('id_detail', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function joinPaket()
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_detailpaket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->where('tbl_detailpaket.id_paket = tbl_paket.id_paket');

        $query = $this->db->get()->result();
        return $query;
    }

    public function tambah($post)
    {
        $array['id_paket'] = $post['nama_paket'];
        $array['tipe_paket'] = $post['tipe_paket'];
        $array['jumlah_tayang'] = $post['tayang'];
        $array['harga'] = $post['harga'];

        $this->db->insert('tbl_detailpaket', $array);
    }

    public function edit($post)
    {
        $array['nama_paket'] = $post['nama_paket'];;


        $this->db->where('id_paket', $post['id_paket']);
        $this->db->update('tbl_paket', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_detail', $id);
        $this->db->delete('tbl_detailpaket');
    }

    public function getPaketUtama()
    {
        $this->db->select('*');
        $this->db->distinct('nama_paket');
        $this->db->from('tbl_paket');

        $query = $this->db->get()->result();
        return $query;
    }
}
