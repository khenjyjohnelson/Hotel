<h1>Profil User</h1>
<hr>
<div class="row">
  <div class="col-md-6">
    <?php foreach ($user as $u) : ?>

      <!-- tombol untuk memunculkan modal memperbaiki password -->
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#password<?= $u->id_user; ?>">
        <i class="fas fa-edit"></i> Ubah Password</a>

      <!-- form ini terpisah dengan form ubah password untuk keamanan sesama :) -->
      <form action="<?= site_url('user/update_profil') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama</label>
          <input class="form-control pengaturan" type="text" name="nama" value="<?= $u->nama; ?>">
          <input type="hidden" name="id_user" value="<?= $u->id_user; ?>">
        </div>

        <div class="form-group">
          <label>Email*</label>
          <input class="form-control pengaturan" type="text" name="email" value="<?= $u->email; ?>">
        </div>

        <div class="form-group">
          <label>Nomor Telepon</label>
          <input class="form-control pengaturan" type="text" name="hp" value="<?= $u->hp; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data profil?')" type="submit">Simpan Perubahan</button>
        </div>
        <small>*Merubah email ini tidak akan merubah email yang ada di pesanan</small>
      </form>
    <?php endforeach; ?>
  </div>

  <div class="col-md-6">
    <img class="img-fluid" src="img/account.png">
  </div>
</div>


<!-- modal edit password-->
<?php foreach ($user as $u) : ?>
  <div id="password<?= $u->id_user; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Password Anda</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <form action="<?= site_url('user/update_password') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="old_password" placeholder="Masukkan password lama">
              <input type="hidden" name="id_user" value="<?= $u->id_user; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="password" placeholder="Masukkan password baru">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi password baru">
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah password?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>