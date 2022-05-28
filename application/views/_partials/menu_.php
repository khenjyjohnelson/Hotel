<!-- sedang mencoba fitur ini tapi belum berhasil
https://stackoverflow.com/questions/17975922/how-to-change-active-class-while-click-to-another-link-in-bootstrap-use-jquery
https://stackoverflow.com/questions/2027935/how-to-remove-css-property-using-javascript
semoga suatu saat akan berhasil :) -->

<!-- menu navigasi untuk pengguna tanpa akun/umum -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('user/login') ?>">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome') ?>">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/kamar') ?>">Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/fasilitas') ?>">Fasilitas</a>
  </li>

  <li class="nav-item">

    <!-- tombol untuk memunculkan modal cari -->
    <a class="nav-link text-decoration-none font-weight-bold" data-toggle="modal" data-target="#cari" href="#">Cari</a>

  </li>
</ul>