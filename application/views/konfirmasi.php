<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">

      <!-- menampilkan data pesanan sebagai ps -->
      <?php if (isset($pesanan)) { ?>
        <div class="col-md">
          <h1 class="text-center">Pesanan Berhasil</h1>
          <p class="text-center">Id Pesanan Anda adalah <?= $pesanan->id_pesanan ?></p>
          <p class="text-center">Cari data reservasi Anda dengan menggunakan <br>
            id pesanan dan email anda <br>
            untuk mencetak bukti reservasi</p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>

      <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan pemesanan apapun</h1>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>

</body>

</html>