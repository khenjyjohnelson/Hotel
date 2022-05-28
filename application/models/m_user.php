<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

  private $tabel = 'user';

	public function ambildata()
	{
		return $this->db->get($this->tabel);
	}

	public function ambil($where)
	{
    $this->db->where('id_user', $where);
		return $this->db->get($this->tabel);
	}

	public function cekemail($email)
	{
    $this->db->where('email', $email);
		return $this->db->get($this->tabel);
	}

	public function ceklogin($email, $password)
	{
    $this->db->where('email', $email);
    $this->db->where('password', $password);
		return $this->db->get($this->tabel);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function update($data, $where)
	{
    $this->db->where('id_user', $where);
		return $this->db->update($this->tabel, $data);
	}

	public function hapus($where)
	{
    $this->db->where('id_user', $where);
		return $this->db->delete($this->tabel);
	}
}
