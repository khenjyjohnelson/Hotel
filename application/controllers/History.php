<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

	public function index($id = 1)
	{
		// nilai min dan max di sini belum ada
		$min = $this->input->get('min');
		$max = $this->input->get('max');

		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->ambildata()->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}
	
	public function filter($id = 1)
	{
		// nilai min dan max sudah diinput sebelumnya
		$min = $this->input->get('min');
		$max = $this->input->get('max');
		
		$data = array(
			'title' => 'Data History',
			'head' => '_partials/head',
			'konten' => 'v_admin-history',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'history' => $this->htr->filter($min, $max)->result(),

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'min' => $min,
			'max' => $max,
		);

		$this->load->view('template', $data);
	}

	public function hapus($id_history = null)
	{
		$hapus = $this->htr->hapus($id_history);
		redirect(site_url('history'));
	}
}
