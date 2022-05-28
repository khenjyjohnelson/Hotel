<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fashotel extends CI_Model
{

	private $tabel = 'fashotel';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_fashotel', $where);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_fashotel', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_fashotel', $where);
		return $this->db->delete($this->tabel);
	}
}
