<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pembayaran', 'tbl_jadwal.id_pembayaran = tbl_pembayaran.id_pembayaran');
        $this->db->join('tbl_pengguna', 'tbl_pembayaran.id_pengguna = tbl_pengguna.id_pengguna');

        $query = $this->db->get()->result();
        return $query;
    }

    public function tambah($post)
    {
        $array['id_pembayaran'] = $post['id_pembayaran'];
        $array['tanggal_tayang'] = $post['tanggal_tayang'];
        $array['jam'] = $post['jam'];
        $array['keterangan'] = $post['keterangan'];

        $this->db->insert('tbl_jadwal', $array);
    }

    public function hapus($id)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->delete('tbl_jadwal');
    }

    public function getPembayaran()
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->where('status_p', 'Lunas');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getAll($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        $this->db->where('id_jadwal', $id);

        $query = $this->db->get();
        return $query;
    }

    public function edit($post)
    {
        $array['id_pembayaran'] = $post['id_pembayaran'];
        $array['tanggal_tayang'] = $post['tanggal_tayang'];
        $array['jam'] = $post['jam'];
        $array['keterangan'] = $post['keterangan'];

        $this->db->where('id_jadwal', $post['id_jadwal']);
        $this->db->update('tbl_jadwal', $array);
    }
}
