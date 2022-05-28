<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Kamar</h1>
<hr>
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Kamar</th>
      <th>Tipe Kamar</th>
      <th>Stok Kamar</th>
      <th>Image</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kamar as $k) : ?>
      <tr>
        <td><?= $k->id_kamar; ?></td>
        <td><?= $k->tipe ?></td>
        <td><?= $k->stok ?></td>
        <td><img src="img/kamar/<?= $k->img ?>" width="100"></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $k->id_kamar; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $k->id_kamar; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data kamar?')" href="<?= site_url('kamar/hapus/' . $k->id_kamar) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Id Kamar</th>
      <th>Tipe Kamar</th>
      <th>Stok Kamar</th>
      <th>Image</th>
      <th>Aksi</th>
    </tr>
  </tfoot>


</table>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action="<?= site_url('kamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Tipe Kamar</label>
            <input class="form-control" type="text" required name="tipe" placeholder="Masukkan tipe kamar">
          </div>

          <div class="form-group">
            <label>Stok Kamar</label>
            <input class="form-control" type="number" required name="stok" min="0" value="1">
          </div>

          <div class="form-group">
            <label>Tambah Gambar</label>
            <input class="form-control-file" required type="file" name="img">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($kamar as $k) : ?>
  <div id="ubah<?= $k->id_kamar; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Kamar <?= $k->id_kamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        
        <form action="<?= site_url('kamar/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar</label>
              <input class="form-control" type="text" required name="tipe" value="<?= $k->tipe; ?>">
              <input type="hidden" name="id_kamar" value="<?= $k->id_kamar; ?>">
            </div>

            <div class="form-group">
              <label>Stok Kamar</label>
              <input class="form-control" type="text" required name="stok" value="<?= $k->stok; ?>">
            </div>

            <img src="img/kamar/<?= $k->img; ?>" width="300">
            <hr>

            <div class="form-group">
              <label>Ubah Gambar</label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $k->img; ?>">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal lihat -->
<?php foreach ($kamar as $k) : ?>
  <div id="lihat<?= $k->id_kamar; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kamar <?= $k->id_kamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar : </label>
              <p><?= $k->tipe; ?></p>
            </div>

            <div class="form-group">
              <label>Stok Kamar : </label>
              <p><?= $k->stok; ?></p>
            </div>

            <img src="img/kamar/<?= $k->img; ?>" width="450">

          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>