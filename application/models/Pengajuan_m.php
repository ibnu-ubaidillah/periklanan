<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{

    public function getPengajuan($id, $level)
    {
        if ($level == 3) {
            $this->db->select('*');
            $this->db->from('tbl_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
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
            $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
            $this->db->where('tbl_pengajuan.status', 'Pending');
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');

            $query = $this->db->get()->result();
            return $query;
        }
    }

    public function getPengajuanTerima($id, $level)
    {
        if ($level == 3) {
            $this->db->select('*');
            $this->db->from('tbl_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
            $this->db->where('tbl_pengajuan.status', 'Diterima');
            $this->db->where('tbl_pengajuan.id_pengguna', $id);
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        } else {
            $this->db->select('*');
            $this->db->from('tbl_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
            $this->db->where('tbl_pengajuan.status', 'Diterima');
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        }

        $query = $this->db->get()->result();
        return $query;
    }

    public function getPengajuanTolak($id, $level)
    {
        if ($level == 3) {
            $this->db->select('*');
            $this->db->from('tbl_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
            $this->db->where('tbl_pengajuan.status', 'Ditolak');
            $this->db->where('tbl_pengajuan.id_pengguna', $id);
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        } else {
            $this->db->select('*');
            $this->db->from('tbl_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
            $this->db->where('tbl_pengajuan.status', 'Ditolak');
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        }
        $query = $this->db->get()->result();
        return $query;
    }

    public function generateKodePengajuan()
    {
        $query = $this->db->query("SELECT MAX(kode_pengajuan) AS kodepengajuan FROM tbl_pengajuan");
        $hasil = $query->row();
        return $hasil->kodepengajuan;
    }

    public function tambah($post)
    {
        $array['kode_pengajuan'] = $post['kode_pengajuan'];
        $array['id_pengguna'] = $post['id_pengguna'];
        $array['konten'] = $post['konten'];
        $array['caption'] = $post['caption'];
        $array['id_detail'] = $post['id_detail'];
        $array['tanggal'] = date('Ymd');
        $array['keterangan'] = '-';

        $this->db->insert('tbl_pengajuan', $array);
    }

    public function detailPaket()
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_detailpaket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_tipepaket', 'tbl_tipepaket.id_tipepaket = tbl_detailpaket.id_tipepaket');
        $this->db->order_by('tbl_paket.id_paket');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getDetailPengajuan($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_paket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_tipepaket', 'tbl_detailpaket.id_tipepaket = tbl_tipepaket.id_tipepaket');
        $this->db->where('tbl_pengajuan.id_pengajuan', $id);

        $query = $this->db->get()->result();
        return $query;
    }

    public function respon($post)
    {
        $array['status'] = $post['status'];
        $array['keterangan'] = $post['alasan'];

        $this->db->where('id_pengajuan', $post['id_pengajuan']);
        $this->db->update('tbl_pengajuan', $array);
    }

    public function getAllPengajuan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');

        $query = $this->db->get()->result();
        return $query;
    }
}
