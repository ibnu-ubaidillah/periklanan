<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_m extends CI_Model {

    public function getPaket()
    {
        
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_detailpaket', 'tbl_detailpaket.id_paket = tbl_paket.id_paket');
        $this->db->order_by('tbl_paket.id_paket');

        $query = $this->db->get()->result_array();
        return $query;
    }

}