<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function getPengguna()
    {

        $query = $this->db->get('tbl_pengguna');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getPaket()
    {
        $query = $this->db->get('tbl_detailpaket');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getPengajuan()
    {
        $query = $this->db->get('tbl_pengajuan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getPembayaran()
    {
        $query = $this->db->get_where('tbl_pembayaran', array('status_p =' => 'Lunas'));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
