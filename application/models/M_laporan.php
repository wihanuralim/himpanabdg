<?php

class M_laporan extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('iuran_anggota');
    }
}
