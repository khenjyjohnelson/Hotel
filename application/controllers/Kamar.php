<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Kamar',
			'head' => '_partials/head',
			'konten' => 'v_admin-kamar',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'kamar' => $this->kmr->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/kamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_kamar' => '',
			'tipe' => $this->input->post('tipe'),
			'stok' => $this->input->post('stok'),
			'img' => $gambar,
		);

		$simpan = $this->kmr->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}

	public function update()
	{
		$config['upload_path'] = './assets/img/kamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_kamar');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'stok' => $this->input->post('stok'),
			'img' => $gambar,
		);

		$update = $this->kmr->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}

	public function hapus($id_kamar = null)
	{
		$kamar = $this->kmr->ambil($id_kamar)->result();
		$img = $kamar[0]->img;

		unlink('./assets/img/kamar/' . $img);
		$hapus = $this->kmr->hapus($id_kamar);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Kamar berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Kamar gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('kamar'));
	}
}
