<?php

class M_surat_masuk extends CI_Model
{

	public function tampil_data()
	{
		return $this->db->get('surat_masuk');
	}

	public function input_data($data)
	{
		$this->db->insert('surat_masuk', $data);
	}

	public function detail_data($id = NULL)
	{
		$query = $this->db->get_where('surat_masuk', array('idsm' => $id))->row();
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
}
