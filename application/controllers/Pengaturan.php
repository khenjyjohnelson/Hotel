<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data Pengaturan',
			'head' => '_partials/head',
			'konten' => 'v_admin-pengaturan',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('template', $data);
	}

	public function update()
	{
		$where = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'metadesc' => $this->input->post('metadesc'),
			'fb' => $this->input->post('fb'),
			'ig' => $this->input->post('ig'),
		);

		$update = $this->ptn->update($data, $where);
							
		if ($update) {
			$this->session->set_flashdata('pesan', 'Data website berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Data website gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		
		redirect(site_url('pengaturan'));
	}

	public function update_favicon()
	{
		$config['upload_path'] = './assets/img/';

		// nama file telah ditetapkan dan hanya berekstensi png dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = 'png';
		$config['file_name'] = 'favicon';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES['favicon']['name'];

		if ($gambar) {
			$this->upload->do_upload('favicon');
		} else {
			$gambar = $this->input->post('txtfavicon');
		}

		$where = $this->input->post('id');

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'favicon' => 'favicon.png',
		);

		$update = $this->ptn->update($data, $where);
					
		if ($update) {
			$this->session->set_flashdata('pesan', 'Favicon berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Favicon gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		
		redirect(site_url('pengaturan'));
	}

	public function update_logo()
	{
		$config['upload_path'] = './assets/img/';

		// nama file telah ditetapkan dan hanya berekstensi png dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = 'png';
		$config['file_name'] = 'logo';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES['logo']['name'];

		if ($gambar) {
			$this->upload->do_upload('logo');
		} else {
			$gambar = $this->input->post('txtlogo');
		}

		$where = $this->input->post('id');

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'logo' => 'logo.png',
		);

		$update = $this->ptn->update($data, $where);
				
		if ($update) {
			$this->session->set_flashdata('pesan', 'Logo berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Logo gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		
		redirect(site_url('pengaturan'));
	}

	public function update_foto()
	{
		$config['upload_path'] = './assets/img/';
		
		// nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = 'foto';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$gambar = $_FILES['foto']['name'];

		if ($gambar) {
			$this->upload->do_upload('foto');
		} else {
			$gambar = $this->input->post('txtfoto');
		}

		$where = $this->input->post('id');

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			'foto' => 'foto.jpg',
		);

		$update = $this->ptn->update($data, $where);
							
		if ($update) {
			$this->session->set_flashdata('pesan', 'Foto berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {
			$this->session->set_flashdata('pesan', 'Foto gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		
		redirect(site_url('pengaturan'));
	}
}
