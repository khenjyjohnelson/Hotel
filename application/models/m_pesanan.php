<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{
	private $tabel = 'pesanan';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
		$this->db->where('id_pesanan', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_id_user($where)
	{
		$this->db->where('id_user', $where);
		return $this->db->get($this->tabel);
	}

	public function ambil_email($where)
	{
		$this->db->where('email', $where);
		return $this->db->get($this->tabel);
	}

	public function cari($id_pesanan, $email)
	{
		$this->db->where('id_pesanan', $id_pesanan);
		$this->db->where('email', $email);
		return $this->db->get($this->tabel);
	}

	public function filter($min, $max)
	{
		$sql = "SELECT * FROM pesanan WHERE cek_in BETWEEN '" . $min . "' AND '" . $max . "'";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_pesanan', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
		$this->db->where('id_pesanan', $where);
		return $this->db->delete($this->tabel);
	}
}
