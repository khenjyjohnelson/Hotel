<!-- mengarahkan ke no_akses jika akses user bukan administrator -->
<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Fasilitas Hotel</h1>
<hr>

<!-- menampilkan modal tambah -->
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<!-- tabel data fasilitas -->
<table class="table table-light" id="data">

  <!-- header tabel -->
  <thead class="thead-light">
    <tr>
      <th>Id</th>
      <th>Nama Fasilitas</th>
      <th>Keterangan</th>
      <th>Image</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>

    <!-- menampilkan setiap baris data fashotel sebagai fh dalam tabel -->
    <?php foreach ($fashotel as $fh) : ?>
      <tr>
        <td><?= $fh->id_fashotel; ?></td>
        <td><?= $fh->nama ?></td>
        <td><?= $fh->keterangan ?></td>
        <td><img src="img/fashotel/<?= $fh->img ?>" width="100"></td>

        <!-- menampilkan modal lihat data berdasarkan id -->
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $fh->id_fashotel; ?>">
            <i class="fas fa-eye"></i></a>

          <!-- menampilkan modal ubah data berdasarkan id -->
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $fh->id_fashotel; ?>">
            <i class="fas fa-edit"></i></a>

          <!-- menghapus data berdasarkan id -->
          <a class="btn btn-light text-danger" type="button" onclick="return confirm('Hapus data fasilitas?')" href="<?= site_url('fashotel/hapus/' . $fh->id_fashotel) ?>">
            <i class="fas fa-trash"></i></a>

        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>

  <!-- footer tabel -->
  <tfoot>
    <tr>
      <th>Id Fasilitas</th>
      <th>Nama Fasilitas</th>
      <th>Keterangan</th>
      <th>Image</th>
      <th>Aksi</th>
    </tr>
  </tfoot>

</table>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- header modal -->
      <div class="modal-header">

        <h5 class="modal-title">Tambah Fasilitas</h5>

        <!-- tombol tutup modal -->
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>

      </div>

      <!-- form tambah yang bisa menginput gambar -->
      <form action="<?= site_url('fashotel/tambah') ?>" method="post" enctype="multipart/form-data">

        <!-- isi modal -->
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Fasilitas</label>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama fasilitas">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" required name="keterangan" rows="3" placeholder="Masukkan keterangan fasilitas"></textarea>
          </div>

          <div class="form-group">
            <label>Tambah Gambar</label>
            <input class="form-control-file" type="file" required name="img">
          </div>
        </div>

        <!-- footer modal -->
        <div class="modal-footer">

          <!-- tombol simpan data -->
          <button class="btn btn-success" type="submit">Simpan</button>

        </div>

      </form>

    </div>
  </div>
</div>

<!-- menampilkan data fashotel sebagai fh dalam modal -->
<?php foreach ($fashotel as $fh) : ?>

  <!-- modal edit -->
  <div id="ubah<?= $fh->id_fashotel; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- header modal -->
        <div class="modal-header">
          <h5 class="modal-title">Edit Fasilitas <?= $fh->id_fashotel; ?></h5>

          <!-- tombol tutup modal -->
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>

        <!-- form edit -->
        <form action="<?= site_url('fashotel/update') ?>" method="post" enctype="multipart/form-data">

          <!-- isi modal -->
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Fasilitas</label>
              <input class="form-control" type="text" required name="nama" value="<?= $fh->nama; ?>">
              <input type="hidden" name="id_fashotel" value="<?= $fh->id_fashotel; ?>">
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" required name="keterangan" rows="3"><?= $fh->keterangan; ?></textarea>
            </div>

            <img src="img/fashotel/<?= $fh->img; ?>" width="300">
            <hr>

            <!-- jika img tidak diinput, maka txtimg akan diinput -->
            <div class="form-group">
              <label>Ubah Gambar</label>
              <input class="form-control-file" type="file" name="img">
              <input type="hidden" name="txtimg" value="<?= $fh->img; ?>">
            </div>
          </div>

          <!-- footer modal -->
          <div class="modal-footer">

            <!-- tombol simpan data -->
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>

          </div>

        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>

<!-- menampilkan data fashotel sebagai fh dalam modal -->
<?php foreach ($fashotel as $fh) : ?>

  <!-- modal lihat -->
  <div id="lihat<?= $fh->id_fashotel; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <!-- header modal -->
        <div class="modal-header">
          <h5 class="modal-title">Fasilitas <?= $fh->id_fashotel; ?></h5>

          <!-- tombol tutup modal -->
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>

        <!-- tag form lihat (tidak wajib) -->
        <form>

          <!-- isi data -->
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Fasilitas : </label>
              <p><?= $fh->nama; ?></p>
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <p><?= $fh->keterangan; ?></p>
            </div>

            <img src="img/fashotel/<?= $fh->img; ?>" width="450">

          </div>

          <!-- footer modal -->
          <div class="modal-footer">

            <!-- tombol tutup modal -->
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>

          </div>

        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>