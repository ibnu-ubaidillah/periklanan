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
        $array['id_paket'] = $post['paket_utama'];
        $array['id_detail'] = $post['tipe_paket'];
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/konten/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['encrypt_name']         = true;
        $config['overwrite']            = true;
        $config['max_width']            = 2048;
        $config['max_height']           = 1000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
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
}
