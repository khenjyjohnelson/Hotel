<!-- mengarahkan ke no_akses jika user tidak memiliki akses -->
<?php if (!$this->session->userdata('akses')) {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Dashboard</h1>
<hr>
<div class="row">

  <!-- menampilkan data untuk administrator -->
  <?php if ($this->session->userdata('akses') == 'administrator') { ?>
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title">Kamar</h5>
          <p class="card-text" style="font-size: 32;"><?= $kamar ?></p>
          <a class="text-white" href="<?= site_url('kamar') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-secondary">
        <div class="card-body">
          <h5 class="card-title">Fasilitas Kamar</h5>
          <p class="card-text" style="font-size: 32;"><?= $faskamar ?></p>
          <a class="text-white" href="<?= site_url('faskamar') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title">Fasilitas Hotel</h5>
          <p class="card-text" style="font-size: 32;"><?= $fashotel ?></p>
          <a class="text-white" href="<?= site_url('fashotel') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-2">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title">User</h5>
          <p class="card-text" style="font-size: 32;"><?= $user ?></p>
          <a class="text-white" href="<?= site_url('user') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

    <!-- menampilkan data untuk resepsionis -->
  <?php } elseif (($this->session->userdata('akses') == 'resepsionis')) { ?>
    <div class="col-lg-2 mt-2">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title">Pesanan</h5>
          <p class="card-text" style="font-size: 32;"><?= $pesanan ?></p>
          <a class="text-white" href="<?= site_url('pesanan') ?>">Lihat Detail >></a>
        </div>
      </div>
    </div>

  <?php } ?>

</div>

<h2 class="mt-4">Detail Website</h2>
<hr>
<?php foreach ($pengaturan as $p) : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Nama : </label>
        <p><?= $p->nama; ?></p>
      </div>

      <div class="form-group">
        <label>Alamat : </label>
        <p><?= $p->alamat; ?></p>
      </div>

      <div class="form-group">
        <label>Email : </label>
        <p><?= $p->email; ?></p>
      </div>

      <div class="form-group">
        <label>Nomor Telepon : </label>
        <p><?= $p->hp; ?></p>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-primary" href="<?= $p->fb; ?>" target="_blank">Akun Facebook</a>
      </div>

      <div class="form-group">
        <a class="text-decoration-none text-danger" href="<?= $p->ig; ?>" target="_blank">Akun Instagram</a>
      </div>
    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/<?= $p->foto ?>">
    </div>
  </div>
<?php endforeach; ?>