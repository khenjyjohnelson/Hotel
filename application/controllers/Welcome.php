<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	// fungsi pertama yang akan diload oleh website
	public function index($id = 1)
	{
		// mengarahkan pengguna ke halaman masing-masing sesuai akses
		if ($this->session->userdata('akses') === "administrator") {

			$this->session->set_flashdata('pesan', 'Selamat datang admin ' . $this->session->userdata('nama') . '!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');

			redirect(site_url('welcome/dashboard'));
		} elseif ($this->session->userdata('akses') === 'resepsionis') {

			$this->session->set_flashdata('pesan', 'Selamat datang resepsionis ' . $this->session->userdata('nama') . '!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');

			redirect(site_url('welcome/dashboard'));
		} else {
			$data = array(
				'title' => 'Selamat Datang Di Hotel Hebat',
				'konten' => 'v_home',
				'head' => '_partials/head',
				'pengaturan' => $this->ptn->ambil($id)->result(),
			);

			$this->load->view('template', $data);
		}
	}

	public function pemesanan($id = 1)
	{
		$data = array(
			'title' => 'Pesan Kamar Anda',
			'konten' => 'v_pemesanan',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'kamar' => $this->kmr->ambildata()->result(),
			'cek_in' => $this->input->get('cek_in'),
			'cek_out' => $this->input->get('cek_out'),
			'jlh' => $this->input->get('jlh'),
		);

		$this->load->view('template', $data);
	}

	public function kamar($id = 1)
	{
		$data = array(
			'title' => 'Daftar Kamar',
			'konten' => 'v_kamar',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'kamar' => $this->kmr->ambildata()->result(),
			'faskamar' => $this->fsk->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function fasilitas($id = 1)
	{
		$data = array(
			'title' => 'Daftar Fasilitas',
			'konten' => 'v_fasilitas',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function dashboard($id = 1)
	{
		$data = array(
			'title' => 'Dashboard',
			'head' => '_partials/head',
			'konten' => 'v_admin-dashboard',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->num_rows(),
			'faskamar' => $this->fsk->ambildata()->num_rows(),
			'kamar' => $this->kmr->ambildata()->num_rows(),
			'pesanan' => $this->psn->ambildata()->num_rows(),
			'user' => $this->usr->ambildata()->num_rows()
		);

		$this->load->view('template', $data);
	}

	// fungsi ketika pengguna mengunjungi halaman yang tidak sesuai dengan akses
	public function no_akses($id = 1)
	{
		$data = array(
			'title' => 'Anda tidak Memiliki Akses',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('no-akses', $data);
	}
}
