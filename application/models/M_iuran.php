<?php

class M_iuran extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('iuran_anggota');
    }

    public function input_data($data)
    {
        $this->db->insert('iuran_anggota', $data);
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('iuran_anggota', array('id' => $id))->row();
        return $query;
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where('id', $where);
        $this->db->update($table, $data);
    }
}
