<!-- halaman peringatan untuk pengguna yang masuk ke halaman tanpa akses yang sesuai -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col">
        <h1 class="text-center">Anda tidak memiliki akses ke halaman ini</h1>
        <div class="d-flex justify-content-center">
          <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
            Kembali ke beranda
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>
</body>

</html>