<!-- menu navigasi untuk pengguna dgn akses administrator -->
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <div class="dropdown">

      <!-- tombol ini akan memunculkan dropdown tanpa menggunakan button
    https://stackoverflow.com/questions/38576503/how-to-remove-the-arrow-in-dropdown-in-bootstrap-4
    terimakasih pada link di atas -->
      <a class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
        <h4>Administrator</h4>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('user/profil') ?>">Profil</a>
        <a class="dropdown-item" href="<?= site_url('user/logout') ?>">Logout</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('welcome/dashboard') ?>">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('kamar') ?>">Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('faskamar') ?>">Fasilitas Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('fashotel') ?>">Fasilitas Hotel</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('user') ?>">User</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('pengaturan') ?>">Pengaturan</a>
  </li>
</ul>