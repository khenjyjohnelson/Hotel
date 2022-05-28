<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index($id = 1)
	{
		$data = array(
			'title' => 'Data User',
			'head' => '_partials/head',
			'konten' => 'v_admin-user',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'user' => $this->usr->ambildata()->result()
		);

		$this->load->view('template', $data);
	}

	public function profil($id = 1)
	{
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'title' => 'Profil',
			'head' => '_partials/head',
			'konten' => 'v_profil',
			'pengaturan' => $this->ptn->ambil($id)->result(),
			'user' => $this->usr->ambil($id_user)->result()
		);

		$this->load->view('template', $data);
	}

	public function login($id = 1)
	{
		$data = array(
			'title' => 'Login',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('login', $data);
	}

	public function signup($id = 1)
	{
		$data = array(
			'title' => 'Sign Up',
			'head' => '_partials/head',
			'pengaturan' => $this->ptn->ambil($id)->result(),
		);

		$this->load->view('signup', $data);
	}

	public function tambah()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cekemail = $this->usr->cekemail($email);

		// mencari apakah jumlah data kurang dari 0
		if ($cekemail->num_rows() < 0) {

			// jika input konfirm sama dengan input password
			if ($this->input->post('konfirm') === $password) {
				$this->load->library('encryption');

				$data = array(
					'nama' => $this->input->post('nama'),
					'email' => $email,

					// mengubah password menjadi password berenkripsi
					'password' => password_hash($password, PASSWORD_DEFAULT),

					'hp' => $this->input->post('hp'),
					'level' => $this->input->post('level'),
				);

				$simpan = $this->usr->simpan($data);

				// mengarahkan pengguna ke halaman yang berbeda sesuai dengan session masing-masing
				if ($this->session->userdata('email')) {

					redirect(site_url('user'));
				} else {

					redirect(site_url('user/login'));
				}

				// jika input konfirm tidak sama dengan input password
			} else {

				// menampilkan flashdata dalam bentuk teks
				$this->session->set_flashdata('pesan', 'Konfirmasi password salah!');

				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Email telah digunakan!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update()
	{
		$where = $this->input->post('id_user');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
		);

		$update = $this->usr->update($data, $where);
		
		if ($update) {

			$this->session->set_flashdata('pesan', 'User berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'User gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		
		// kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_profil()
	{
		$where = $this->input->post('id_user');
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
		);

		$update = $this->usr->update($data, $where);
				
		if ($update) {

			$this->session->set_flashdata('pesan', 'Profil berhasil diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'Profil gagal diubah!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		
		// mengambil data profil yang baru dirubah
		$user = $this->usr->ambil($where)->result();
		$nama = $user[0]->nama;
		$email = $user[0]->email;
		$hp = $user[0]->hp;

		// membuat session baru berdasarkan data yang telah diupdate
		$this->session->set_userdata('nama', $nama);
		$this->session->set_userdata('email', $email);
		$this->session->set_userdata('hp', $hp);

		// kembali ke halaman sebelumnya sesuai dengan masing-masing user dengan akses yang berbeda
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_password()
	{
		$where = $this->input->post('id_user');

		$cek_id = $this->usr->ambil($where);

		// mencari apakah jumlah data lebih dari 0
		if ($cek_id->num_rows() > 0) {
			$user = $cek_id->result();
			$cekpass = $user[0]->password;

			$old_password = $this->input->post('old_password');

			// memverifikasi password lama dengan password di database
			if (password_verify($old_password, $cekpass)) {
				$password = $this->input->post('password');

				// jika konfirmasi password sama dengan password baru
				if ($this->input->post('konfirm') === $password) {
					$this->load->library('encryption');

					$data = array(

						// mengubah password menjadi password berenkripsi
						'password' => password_hash($password, PASSWORD_DEFAULT),
					);

					$update = $this->usr->update($data, $where);

					redirect($_SERVER['HTTP_REFERER']);

					// jika konfirmasi password tidak sama dengan password baru
				} else {

					$this->session->set_flashdata('pesan', 'Konfirmasi password tidak sesuai!');
					redirect($_SERVER['HTTP_REFERER']);
				}

				// jika password lama salah
			} else {

				$this->session->set_flashdata('pesan', 'Password lama salah!');
				redirect($_SERVER['HTTP_REFERER']);
			}

			// jika jumlah data kurang dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Akun tidak tersedia!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function hapus($id_user = null)
	{
		$hapus = $this->usr->hapus($id_user);

				
		if ($hapus) {

			$this->session->set_flashdata('pesan', 'User berhasil dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		} else {

			$this->session->set_flashdata('pesan', 'User gagal dihapus!');
			$this->session->set_flashdata('panggil', '$("#element").toast("show")');
		}
		

		redirect(site_url('user'));
	}

	public function ceklogin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cekemail = $this->usr->cekemail($email);

		// mencari apakah jumlah data kurang dari 0
		if ($cekemail->num_rows() > 0) {
			$user = $cekemail->result();
			$cekpass = $user[0]->password;

			// memverifikasi password dengan password di database
			if (password_verify($password, $cekpass)) {
				$id_user = $user[0]->id_user;
				$nama = $user[0]->nama;
				$email = $user[0]->email;
				$hp = $user[0]->hp;
				$level = $user[0]->level;

				$this->session->set_userdata('id_user', $id_user);
				$this->session->set_userdata('nama', $nama);
				$this->session->set_userdata('email', $email);
				$this->session->set_userdata('hp', $hp);
				$this->session->set_userdata('akses', $level);

				redirect(site_url('welcome'));

				// jika password salah
			} else {

				$this->session->set_flashdata('pesan', 'Password Salah!');
				redirect(site_url('user/login'));
			}

			// jika jumlah data lebih dari 0
		} else {

			$this->session->set_flashdata('pesan', 'Email tidak tersedia!');
			redirect(site_url('user/login'));
		}
	}

	public function logout()
	{
		// menghapus session
		session_destroy();
		redirect(site_url('welcome'));
	}
}
