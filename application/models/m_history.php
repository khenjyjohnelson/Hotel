<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{

	private $tabel = 'history';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_history', $where);
		return $this->db->get($this->tabel);
	}
	
	public function filter($min, $max)
	{
		$sql = "SELECT * FROM history WHERE cek_in BETWEEN '" . $min . "' AND '" . $max . "'";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_history', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function update_pesanan($data, $where)
	{
		$this->db->where('id_pesanan', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_history', $where);
		return $this->db->delete($this->tabel);
	}
}
