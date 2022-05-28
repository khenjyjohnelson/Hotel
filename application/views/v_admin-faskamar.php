<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Fasilitas Kamar</h1>
<hr>
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id</th>
      <th>Tipe Kamar</th>
      <th>Nama Fasilitas</th>
      <th>Image</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($faskamar as $fk) : ?>
      <tr>
        <td><?= $fk->id_faskamar; ?></td>
        <td><?= $fk->tipe ?></td>
        <td><?= $fk->nama ?></td>
        <td><img src="img/faskamar/<?= $fk->img ?>" width="100"></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $fk->id_faskamar; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $fk->id_faskamar; ?>">
            <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('faskamar/hapus/' . $fk->id_faskamar) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id Fasilitas</th>
      <th>Tipe Kamar</th>
      <th>Nama Fasilitas</th>
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
        <h5 class="modal-title">Tambah Fasilitas</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('faskamar/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label>Tipe Kamar</label>
            <select class="form-control" required name="tipe">
              <option selected hidden value="">Pilih Tipe Kamar...</option>
              <?php foreach ($kamar as $k) : ?>

                <!-- mengambil nilai tipe dari kamar -->
                <option><?= $k->tipe; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label>Nama Fasilitas</label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama fasilitas">
          </div>

          <div class="form-group">
            <label>Tambah Gambar</label>
            <input class="form-control-file" type="file" required name="img">
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
<?php foreach ($faskamar as $fk) : ?>
  <div id="ubah<?= $fk->id_faskamar; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Fasilitas <?= $fk->id_faskamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url('faskamar/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">

              <!-- memilih salah satu tipe kamar yang ada -->
              <label>Tipe Kamar</label>
              <select class="form-control" required name="tipe">

                <!-- menampilkan nilai tipe kamar yang aktif -->
                <option selected hidden><?= $fk->tipe; ?></option>

                <?php foreach ($kamar as $k) : ?>
                  <option><?= $k->tipe; ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Nama Fasilitas</label>
              <input class="form-control" type="text" required name="nama" value="<?= $fk->nama; ?>">
              <input type="hidden" name="id_faskamar" value="<?= $fk->id_faskamar; ?>">
            </div>

            <img src="img/faskamar/<?= $fk->img; ?>" width="300">
            <hr>

            <div class="form-group">
              <label>Ubah Gambar</label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $fk->img; ?>">
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

<!-- Modal Lihat -->
<?php foreach ($faskamar as $fk) : ?>
  <div id="lihat<?= $fk->id_faskamar; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Fasilitas <?= $fk->id_faskamar; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipe Kamar : </label>
              <p><?= $fk->tipe; ?></p>
            </div>

            <div class="form-group">
              <label>Nama Fasilitas : </label>
              <p><?= $fk->nama; ?></p>
            </div>

            <img src="img/faskamar/<?= $fk->img; ?>" width="450">
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>