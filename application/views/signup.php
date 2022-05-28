<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<!-- signup dan login memiliki style yg sama -->

<body class="login">

  <div class="container">

    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-5 login">

        <!-- link kembali -->
        <a class="text-decoration-none" href="<?= site_url('welcome') ?>">Kembali ke beranda</a>

        <h1 class="text-center">Sign Up</h1>
        <p class="text-center">Buat akun untuk mendapatkan diskon dan voucher</p>

        <!-- form signup -->
        <form action="<?= site_url('user/tambah') ?>" method="post">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama">
            <input type="hidden" name="level" value="tamu">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="email" required name="email" placeholder="Masukkan email">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="password" placeholder="Masukkan password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="hp" placeholder="Masukkan hp">
          </div>

          <!-- pesan untuk pengguna yang signup -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan') ?></p>

          <!-- tombol signup dan login -->
          <div class="form-group d-flex justify-content-around">
            <button class="btn btn-success login" type="submit">Sign Up</button>
            <a class="btn btn-secondary login" type="button" href="<?= site_url('user/login') ?>">Login</a>
          </div>

        </form>

      </div>
    </div>
  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>