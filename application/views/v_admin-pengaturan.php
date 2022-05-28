<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Pengaturan Website</h1>
<hr>
<div class="row">
  <div class="col-md-6">

  <!-- form edit favicon, logo, dan foto -->
    <?php foreach ($pengaturan as $p) : ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#favicon<?= $p->id; ?>">
        <i class="fas fa-edit"></i> Favicon</a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#logo<?= $p->id; ?>">
        <i class="fas fa-edit"></i> Logo</a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal" data-target="#foto<?= $p->id; ?>">
        <i class="fas fa-edit"></i> Foto</a>

      <form action="<?= site_url('pengaturan/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama</label>
          <input class="form-control pengaturan" required type="text" name="nama" value="<?= $p->nama; ?>">
          <input type="hidden" name="id" value="<?= $p->id; ?>">
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control pengaturan" required name="alamat" rows="3"><?= $p->alamat; ?></textarea>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control pengaturan" required type="text" name="email" value="<?= $p->email; ?>">
        </div>

        <div class="form-group">
          <label>Nomor Telepon</label>
          <input class="form-control pengaturan" required type="text" name="hp" value="<?= $p->hp; ?>">
        </div>

        <div class="form-group">
          <label>Metadesc / Deskripsi Website</label>
          <textarea class="form-control pengaturan" required name="metadesc" rows="5"><?= $p->metadesc; ?></textarea>
        </div>

        <div class="form-group">
          <label>Link Akun Facebook</label>
          <input class="form-control pengaturan" required type="text" name="fb" value="<?= $p->fb; ?>">
        </div>

        <div class="form-group">
          <label>Link Akun Instagram</label>
          <input class="form-control pengaturan" required type="text" name="ig" value="<?= $p->ig; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan Perubahan</button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
  <div class="col-md-6">
    <img class="img-fluid" src="img/engineer.png">
  </div>
</div>


<!-- modal edit favicon-->
<?php foreach ($pengaturan as $p) : ?>
  <div id="favicon<?= $p->id; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Favicon <?= $p->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_favicon') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <img src="img/<?= $p->favicon; ?>" width="300">
            <hr>

            <div class="form-group">
              <label>Ubah Favicon</label>
              <input class="form-control-file" required type="file" name="favicon">
              <input type="hidden" name="id" value="<?= $p->id; ?>">
              <input type="hidden" name="txtfavicon" value="<?= $p->favicon; ?>">
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah favicon?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit logo-->
<?php foreach ($pengaturan as $p) : ?>
  <div id="logo<?= $p->id; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Logo <?= $p->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_logo') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <img src="img/<?= $p->logo; ?>" width="300">
            <hr>

            <div class="form-group">
              <label>Ubah Logo</label>
              <input class="form-control-file" required type="file" name="logo">
              <input type="hidden" name="id" value="<?= $p->id; ?>">
              <input type="hidden" name="txtlogo" value="<?= $p->logo; ?>">
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah logo website?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit foto-->
<?php foreach ($pengaturan as $p) : ?>
  <div id="foto<?= $p->id; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Foto <?= $p->id; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('pengaturan/update_foto') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <img src="img/<?= $p->foto; ?>" width="300">
            <hr>

            <div class="form-group">
              <label>Ubah Foto</label>
              <input class="form-control-file" required type="file" name="foto">
              <input type="hidden" name="id" value="<?= $p->id; ?>">
              <input type="hidden" name="txtfoto" value="<?= $p->foto; ?>">
            </div>
          </div>
          
          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah foto website?')" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>