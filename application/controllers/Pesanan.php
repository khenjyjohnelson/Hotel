<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

	public function index($id = 1)
	{
		// nilai min dan max di sini belum ada
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_admin-pesanan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function daftar($id = 1)
	{
		$where = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambil_id_user($where)->result()
		);

		$this->load->view('template', $data);
	}

	public function cari($id = 1)
	{
		$id_pesanan = $this->input->get('id_pesanan');
		$email = $this->input->get('email');

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_reservasi',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mencari dan menampilkan id pesanan berdasarkan id_pesanan yang telah diinput
			'pesanan' => $this->psn->cari($id_pesanan, $email)->result()
		);

		$this->load->view('template', $data);
	}

	public function filter($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data Pesanan',
			'head' => '_partials/head',
			'konten' => 'v_admin-pesanan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->filter($min, $max)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$email = $this->input->post('email');

		$data = array(
			'id_pesanan' => '',
			'id_user' => $this->input->post('id_user'),
			'pemesan' => $this->input->post('pemesan'),
			'email' => $email,
			'hp' => $this->input->post('hp'),
			'tamu' => $this->input->post('tamu'),
			'tipe' => $this->input->post('tipe'),
			'jlh' => $this->input->post('jlh'),
			'cek_in' => $this->input->post('cek_in'),
			'cek_out' => $this->input->post('cek_out'),
			'status' => "menunggu"
		);

		// membuat session supaya nilainya dapat digunakan selama waktu yang ditentukan dalam detik
		$this->session->set_tempdata('email_pemesan', $email, 300);

		$simpan = $this->psn->simpan($data);

		if ($simpan) {

			$this->session->set_flashdata('pesan', 'Pesanan berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Pesanan gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pesanan/konfirmasi'));
	}

	public function konfirmasi($id = 1)
	{
		$where = $this->session->tempdata('email_pemesan');
		$data = array(
			'title' => 'Pemesanan Berhasil',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),

			// mengembalikan data baris terakhir/terbaru sesuai ketentuan dalam database untuk ditampilkan
			'pesanan' => $this->psn->ambil_email($where)->last_row(),
		);

		$this->load->view('konfirmasi', $data);
	}

	public function update_status()
	{
		$where = $this->input->post('id_pesanan');
		$data = array(
			'status' => $this->input->post('status')
		);

		// jika status pesanan cek in
		if ($this->input->post('status') == 'cek in') {

			// hanya merubah status pesanan
			$update = $this->psn->update($data, $where);

			// jika status pesanan cek out
		} elseif ($this->input->post('status') == 'cek out') {

			// menghapus data pesanan supaya trigger tambah_kamar dapat berjalan
			$hapus = $this->psn->hapus($where);

			// memasukkan nama resepsionis yang melakukan operasi
			$data = array(
				'user_aktif' => $this->session->userdata('nama')
			);

			// mengupdate pesanan dengan nama user yang aktif
			$update = $this->htr->update_pesanan($data, $where);
		}

		if ($update) {

			$this->session->set_flashdata('pesan', 'Status pesanan berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Status pesanan gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pesanan'));
	}

	public function hapus($id_pesanan = null)
	{
		$hapus = $this->psn->hapus($id_pesanan);

		if ($hapus) {

			$this->session->set_flashdata('pesan', 'Pesanan berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Pesanan gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('pesanan'));
	}

	public function print($id_pesanan = null, $id = 1)
	{
		$data = array(
			'title' => 'Bukti Reservasi',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'pesanan' => $this->psn->ambil($id_pesanan)->result()
		);

		$this->load->view('print', $data);
	}
}
