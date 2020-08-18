<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{
    var $tabel = "tbl_pengajuan";

    public function getPengajuan($id, $level)
    {
        if ($level == 3) {
            $this->db->select('*');
            $this->db->from('tbl_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->join('tbl_paket', 'tbl_pengajuan.id_paket = tbl_paket.id_paket');
            $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
            $this->db->where('tbl_pengajuan.status', 'Pending');
            $this->db->where('tbl_pengajuan.id_pengguna', $id);
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');

            $query = $this->db->get()->result();
            return $query;
        } else {
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
    }


    public function getPengajuanTerima()
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

    public function getPengajuanTolak()
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
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_detailpaket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->where('tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->group_by('tbl_paket.id_paket');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getDetailPaket($id)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_detailpaket a JOIN tbl_tipepaket b ON tbl_detailpaket.id_tipepaket = tbl_tipepaket.id_tipepaket WHERE id_paket='$id'");
        return $hasil->result();
    }

    public function getJmlTayang($id)
    {
        $hasil = $this->db->query("SELECT jumlah_tayang FROM tbl_detailpaket WHERE id_tipepaket='$id' GROUP BY id_tipepaket");
        return $hasil->result();
    }

    public function generateKodePengajuan()
    {
        $query = $this->db->query("SELECT MAX(kode_pengajuan) AS kodepengajuan FROM tbl_pengajuan");
        $hasil = $query->row();
        return $hasil->kodepengajuan;
    }
}
