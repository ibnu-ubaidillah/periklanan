<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_m extends CI_Model
{

    public function getPembayaranPending($id, $level)
    {
        if ($level == 3) {
            $this->db->select('*');
            $this->db->from('tbl_pembayaran');
            $this->db->join('tbl_pengajuan', 'tbl_pembayaran.id_pengajuan = tbl_pengajuan.id_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->where('tbl_pembayaran.status_p', 'Belum Lunas');
            $this->db->where('tbl_pembayaran.id_pengguna', $id);
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        } else {
            $this->db->select('*');
            $this->db->from('tbl_pembayaran');
            $this->db->join('tbl_pengajuan', 'tbl_pembayaran.id_pengajuan = tbl_pengajuan.id_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pembayaran.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->where('tbl_pembayaran.status_p', 'Belum Lunas');
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        }

        $query = $this->db->get()->result();
        return $query;
    }

    public function getPembayaranTerima($id, $level)
    {
        if ($level == 3) {
            $this->db->select('*');
            $this->db->from('tbl_pembayaran');
            $this->db->join('tbl_pengajuan', 'tbl_pembayaran.id_pengajuan = tbl_pengajuan.id_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->where('tbl_pembayaran.status_p', 'Lunas');
            $this->db->where('tbl_pembayaran.id_pengguna', $id);
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        } else {
            $this->db->select('*');
            $this->db->from('tbl_pembayaran');
            $this->db->join('tbl_pengajuan', 'tbl_pembayaran.id_pengajuan = tbl_pengajuan.id_pengajuan');
            $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
            $this->db->where('tbl_pembayaran.status_p', 'Lunas');
            $this->db->order_by('tbl_pengajuan.tanggal', 'DESC');
        }

        $query = $this->db->get()->result();
        return $query;
    }

    public function generateKodePembayaran()
    {
        $query = $this->db->query("SELECT MAX(kode_pembayaran) AS kodepembayaran FROM tbl_pembayaran");
        $hasil = $query->row();
        return $hasil->kodepembayaran;
    }

    public function tambah($post)
    {
        $array['id_pengajuan'] = $post['id_pengajuan'];
        $array['id_pengguna'] = $post['id_pengguna'];
        $array['id_rekening'] = $post['id_rekening'];
        $array['kode_pembayaran'] = $post['kode_pembayaran'];
        $array['tanggal'] = date('Ymd');

        $this->db->insert('tbl_pembayaran', $array);
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

    public function getAllPengajuanById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_pengguna', 'tbl_pengajuan.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->where('tbl_pengajuan.id_pengguna', $id);
        $this->db->where('tbl_pengajuan.status', 'Diterima');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getAllRekening()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');

        $query = $this->db->get()->result();
        return $query;
    }

    public function getAllPembayaran($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_pengajuan', 'tbl_pembayaran.id_pengajuan = tbl_pengajuan.id_pengajuan');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->join('tbl_paket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_tipepaket', 'tbl_detailpaket.id_tipepaket = tbl_tipepaket.id_tipepaket');
        $this->db->join('tbl_pengguna', 'tbl_pembayaran.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_rekening', 'tbl_pembayaran.id_rekening = tbl_rekening.id_rekening');
        $this->db->where('id_pembayaran', $id);

        $query = $this->db->get()->result();
        return $query;
    }

    public function getInvoice()
    {
        $sql = "SELECT MAX(MID(invoice, 9, 4)) AS invoice_no FROM tbl_pembayaran WHERE MID(invoice, 3, 6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $no = ((int)$row->invoice_no) + 1;
            $hasil = sprintf("%'.04d", $no);
        } else {
            $hasil = "0001";
        }
        $invoice = "AC" . date('ymd') . $hasil;
        return $invoice;
    }

    public function updateBukti($post)
    {
        $array['invoice'] = $post['invoice'];
        $array['bukti_pembayaran'] = $post['bukti_pembayaran'];
        $array['status_p'] = "Lunas";

        $this->db->where('id_pembayaran', $post['id_pembayaran']);
        $this->db->update('tbl_pembayaran', $array);
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_pengajuan', 'tbl_pembayaran.id_pengajuan = tbl_pengajuan.id_pengajuan');
        $this->db->join('tbl_detailpaket', 'tbl_pengajuan.id_detail = tbl_detailpaket.id_detail');
        $this->db->join('tbl_paket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->join('tbl_tipepaket', 'tbl_detailpaket.id_tipepaket = tbl_tipepaket.id_tipepaket');
        $this->db->join('tbl_pengguna', 'tbl_pembayaran.id_pengguna = tbl_pengguna.id_pengguna');
        $this->db->join('tbl_rekening', 'tbl_pembayaran.id_rekening = tbl_rekening.id_rekening');

        $query = $this->db->get()->result();
        return $query;
    }
}
