<?php if ($this->session->userdata('akses') <> 'resepsionis') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar History</h1>
<hr>

<!-- tabel fiter history -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url('history/filter') ?>" method="get">
    <tr>
      <td>Filter Tanggal Cek In</td>
    </tr>
    <tr>
      <td class="pr-2">Dari</td>
      <td class="pr-2">Ke</td>
    </tr>
    <tr>
      <td class="pr-2">
        <input type="date" class="form-control" required name="min" value="<?= $min ?>">
      </td>
      <td class="pr-2">
        <input type="date" class="form-control" required name="max" value="<?= $max ?>">
      </td>
      <td><button type="submit" class="btn btn-primary">Cari</button></td>
    </tr>
  </form>
</table>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id Pesanan</th>
      <th>Tamu</th>
      <th>Tipe</th>
      <th>Cek In</th>
      <th>Cek Out</th>
      <th>Tanggal Perubahan</th>
      <th>Resepsionis</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($history as $h) : ?>
      <tr>
        <td><?= $h->id_pesanan ?></td>
        <td><?= $h->tamu ?></td>
        <td><?= $h->tipe ?></td>
        <td><?= $h->cek_in ?></td>
        <td><?= $h->cek_out ?></td>
        <td><?= $h->tgl_perubahan ?></td>
        <td><?= $h->user_aktif ?></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $h->id_history; ?>">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus data history?')" href="<?= site_url('history/hapus/' . $h->id_history) ?>">
            <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Id Pesanan</th>
      <th>Tamu</th>
      <th>Tipe</th>
      <th>Cek In</th>
      <th>Cek Out</th>
      <th>Tanggal Perubahan</th>
      <th>Aksi</th>
      <th>Resepsionis</th>
    </tr>
  </tfoot>


</table>

<!-- modal lihat -->
<?php foreach ($history as $h) : ?>
  <div id="lihat<?= $h->id_history ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">History <?= $h->id_history ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Id Pesanan</label>
                <p><?= $h->id_pesanan ?></p>
              </div>

              <div class="form-group">
                <label>Pemesan</label>
                <p><?= $h->pemesan ?></p>
              </div>

              <div class="form-group">
                <label>Email</label>
                <p><?= $h->email ?></p>
              </div>

              <div class="form-group">
                <label>Nomor Telepon</label>
                <p><?= $h->hp ?></p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Tamu</label>
                <p><?= $h->tamu ?></p>
              </div>

              <div class="form-group">
                <label>Tipe Kamar</label>
                <p><?= $h->tipe ?></p>
              </div>

              <div class="form-group">
                <label>Tanggal Cek In</label>
                <p><?= $h->cek_in ?></p>
              </div>

              <div class="form-group">
                <label>Tanggal Cek Out</label>
                <p><?= $h->cek_out ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>