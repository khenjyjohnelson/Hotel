<!-- menu navigasi untuk pengguna dgn akses tamu -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <div class="dropdown">
      <a class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
        <h4><?= $this->session->userdata('nama') ?></h4>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('pesanan/daftar') ?>">Daftar Reservasi</a>
        <a class="dropdown-item" href="<?= site_url('user/profil') ?>">Profil</a>
        <a class="dropdown-item" href="<?= site_url('user/logout') ?>">Logout</a>
      </div>
    </div>
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