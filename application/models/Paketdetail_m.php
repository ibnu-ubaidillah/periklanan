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
        $this->db->join('tbl_tipepaket', 'tbl_tipepaket.id_tipepaket = tbl_detailpaket.id_tipepaket');
        $this->db->where('tbl_detailpaket.id_paket = tbl_paket.id_paket');

        $query = $this->db->get()->result();
        return $query;
    }

    public function tambah($post)
    {
        $array['id_paket'] = $post['nama_paket'];
        $array['id_tipepaket'] = $post['tipe_paket'];
        $array['jumlah_tayang'] = $post['tayang'];
        $array['harga'] = $post['harga'];

        $this->db->insert('tbl_detailpaket', $array);
    }

    public function edit($post)
    {
        $array['id_paket'] = $post['nama_paket'];
        $array['id_tipepaket'] = $post['tipe_paket'];
        $array['jumlah_tayang'] = $post['tayang'];
        $array['harga'] = $post['harga'];


        $this->db->where('id_detail', $post['id_detail']);
        $this->db->update('tbl_detailpaket', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_detail', $id);
        $this->db->delete('tbl_detailpaket');
    }

    public function getPaketUtama()
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->group_by('nama_paket');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getKategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_tipepaket');

        $query = $this->db->get()->result();
        return $query;
    }
}
