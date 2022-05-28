<h1>Daftar Reservasi</h1>
<hr>
<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Tamu</th>
      <th>Tanggal Cek In</th>
      <th>Tanggal Cek Out</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($pesanan as $ps) : ?>
      <tr>
        <td><?= $ps->tamu ?></td>
        <td><?= $ps->cek_in ?></td>
        <td><?= $ps->cek_out ?></td>
        <td><a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $ps->id_pesanan ?>" href="#">
            <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-info" href="<?= site_url('pesanan/print/' . $ps->id_pesanan) ?>" target="_blank">
            <i class="fas fa-print"></i></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Tamu</th>
      <th>Tanggal Cek In</th>
      <th>Tanggal Cek Out</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>

<!-- modal lihat -->
<?php foreach ($pesanan as $ps) : ?>
  <div id="lihat<?= $ps->id_pesanan ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pesanan <?= $ps->id_pesanan ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Id Pesanan</label>
                <p><?= $ps->id_pesanan ?></p>
              </div>

              <div class="form-group">
                <label>Pemesan</label>
                <p><?= $ps->pemesan ?></p>
              </div>

              <div class="form-group">
                <label>Email</label>
                <p><?= $ps->email ?></p>
              </div>

              <div class="form-group">
                <label>Nomor Telepon</label>
                <p><?= $ps->hp ?></p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Tamu</label>
                <p><?= $ps->tamu ?></p>
              </div>

              <div class="form-group">
                <label>Tipe Kamar</label>
                <p><?= $ps->tipe ?></p>
              </div>

              <div class="form-group">
                <label>Tanggal Cek In</label>
                <p><?= $ps->cek_in ?></p>
              </div>

              <div class="form-group">
                <label>Tanggal Cek Out</label>
                <p><?= $ps->cek_out ?></p>
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