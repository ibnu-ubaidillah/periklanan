<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{

    public function getPengajuan($id = null)
    {
        $this->db->from('tbl_pengajuan');
        if ($id != null) {
            $this->db->where('id_pengajuan', $id);
        }

        $query = $this->db->get();
        return $query;
    }
}
