<?php

class M_laporan extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('iuran_anggota');
    }
        public function data_report()
    {
        return $this->db->get('pengeluaran');
    }
}

