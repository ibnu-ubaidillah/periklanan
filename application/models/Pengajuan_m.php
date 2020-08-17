<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{
    var $tabel = "tbl_pengajuan";

    public function getPengajuan($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_paket', 'tbl_pengajuan.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->where('tbl_pengajuan.status', 'Pending');
        $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');

        $query = $this->db->get()->result();
        return $query;
    }


    public function getPengajuanTerima($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_paket', 'tbl_pengajuan.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->where('tbl_pengajuan.status', 'Diterima');
        $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getPengajuanTolak($id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_paket', 'tbl_pengajuan.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->where('tbl_pengajuan.status', 'Ditolak');
        $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getPaket()
    {
        $hasil = $this->db->query("SELECT DISTINCT id_paket, nama_paket FROM tbl_paket");
        return $hasil;
    }

    public function getDetailPaket($id)
    {
        $hasil = $this->db->query("SELECT DISTINCT id_detail, id_paket, tipe_paket, jumlah_tayang, harga FROM tbl_detailpaket WHERE id_paket='$id'");
        return $hasil->result();
    }

    public function generateKodePengajuan()
    {
        $query = $this->db->query("SELECT MAX(kode_pengajuan) AS kodepengajuan FROM tbl_pengajuan");
        $hasil = $query->row();
        return $hasil->kodepengajuan;
    }
}
