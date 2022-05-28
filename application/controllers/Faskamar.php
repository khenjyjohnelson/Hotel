<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faskamar extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Faskamar',
			'head' => '_partials/head',
			'konten' => 'v_admin-faskamar',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'faskamar' => $this->fsk->ambildata()->result(),
			'kamar' => $this->kmr->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/faskamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_faskamar' => '',
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
		);

		$simpan = $this->fsk->simpan($data);

		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('faskamar'));
	}

	public function update()
	{
		$config['upload_path'] = './assets/img/faskamar/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		$this->load->library('upload', $config);
		$gambar = $_FILES['img']['name'];

		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_faskamar');
		$data = array(
			'tipe' => $this->input->post('tipe'),
			'nama' => $this->input->post('nama'),
			'img' => $gambar,
		);

		$update = $this->fsk->update($data, $where);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('faskamar'));
	}

	public function hapus($id_faskamar = null)
	{
		$faskamar = $this->fsk->ambil($id_faskamar)->result();
		$img = $faskamar[0]->img;

		unlink('./assets/img/faskamar/' . $img);
		$hapus = $this->fsk->hapus($id_faskamar);

		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('faskamar'));
	}
}
