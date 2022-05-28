<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fashotel extends CI_Controller
{
	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Fashotel',
			'head' => '_partials/head',
			'konten' => 'v_admin-fashotel',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'fashotel' => $this->fsh->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function tambah()
	{
		// konfigurasi upload,
		// sedang berencara menerapkan koding ini
		// https://stackoverflow.com/questions/18705639/how-to-rename-uploaded-file-before-saving-it-into-a-directory
		// rencananya nama gambar akan unik
		// semoga berhasil
		$config['upload_path'] = './assets/img/fashotel/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		// supaya fungsi upload berjalan
		$this->load->library('upload', $config);

		// mengambil nama file dari hasil upload
		$gambar = $_FILES['img']['name'];

		// dieksekusi jika nama gambar ada
		if ($gambar) {
			$this->upload->do_upload('img');
		}

		$data = array(
			'id_fashotel' => '',
			'nama' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
			'img' => $gambar,
		);

		$simpan = $this->fsh->simpan($data);

		// menampilkan toast jika operasi berhasil
		if ($simpan) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal disimpan!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('fashotel'));
	}

	public function update()
	{
		// konfigurasi upload
		$config['upload_path'] = './assets/img/fashotel/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|svg|webp';

		// supaya fungsi upload berjalan
		$this->load->library('upload', $config);

		// mengambil nama file dari hasil upload
		$gambar = $_FILES['img']['name'];

		// dieksekusi jika nama gambar ada
		if ($gambar) {
			$this->upload->do_upload('img');
		} else {
			$gambar = $this->input->post('txtimg');
		}

		$where = $this->input->post('id_fashotel');
		$data = array(
			'nama' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
			'img' => $gambar,
		);

		$update = $this->fsh->update($data, $where);

		// menampilkan toast jika operasi berhasil
		if ($update) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('fashotel'));
	}

	// $id_fashotel akan menjadi $where di model
	public function hapus($id_fashotel = null)
	{
		// mengambil data gambar di database
		$fashotel = $this->fsh->ambil($id_fashotel)->result();
		$img = $fashotel[0]->img;

		// menghapus data dan gambar
		unlink('./assets/img/fashotel/' . $img);
		$hapus = $this->fsh->hapus($id_fashotel);
		
		// menampilkan toast jika operasi berhasil
		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Fasilitas berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Fasilitas gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}

		redirect(site_url('fashotel'));
	}
}
