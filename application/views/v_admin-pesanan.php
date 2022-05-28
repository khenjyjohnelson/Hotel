<?php if ($this->session->userdata('akses') <> 'resepsionis') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar Pesanan</h1>
<hr>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url('pesanan/filter') ?>" method="get">
    <tr>
      <td>Filter Tanggal Cek In</td>
    </tr>
    <tr>
      <td class="pr-2">Dari</td>
      <td class="pr-2">Ke</td>
    </tr>
    <tr>
      <td class="pr-2">
        <input type="date" class="form-control" required name="min">
      </td>
      <td class="pr-2">
        <input type="date" class="form-control" required name="max">
      </td>
      <td><button type="submit" class="btn btn-primary">Cari</button></td>
    </tr>
  </form>
</table>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Tamu</th>
      <th>Tanggal Cek In</th>
      <th>Tanggal Cek Out</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($pesanan as $ps) : ?>
      <tr>
        <td><?= $ps->tamu ?></td>
        <td><?= $ps->cek_in ?></td>
        <td><?= $ps->cek_out ?></td>
        <td><?= $ps->status ?></td>

        <td>

          <!-- tombol yang akan muncul berdasarkan nilai dari status -->
          <?php if ($ps->status == 'menunggu') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $ps->id_pesanan ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($ps->status == 'cek in') { ?>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $ps->id_pesanan ?>">
              <i class="fas fa-edit"></i></a>
          <?php } elseif ($ps->status == 'cek out') { ?>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus pesanan?')" href="<?= site_url('pesanan/hapus/' . $ps->id_pesanan) ?>">
              <i class="fas fa-trash"></i></a>
          <?php } ?>

          <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
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
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>

<!-- modal ubah -->
<?php foreach ($pesanan as $ps) : ?>
  <div id="ubah<?= $ps->id_pesanan ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pesanan <?= $ps->id_pesanan ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- form untuk mengubah nilai status sebuah pesanan -->
        <form action="<?= site_url('pesanan/update_status') ?>" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Id Pesanan</label>
                  <p><?= $ps->id_pesanan ?></p>
                  <input type="hidden" name="id_pesanan" value="<?= $ps->id_pesanan; ?>">

                  <!-- input status berdasarkan nilai status -->
                  <?php if ($ps->status == 'menunggu') { ?>
                    <input type="hidden" name="status" value="cek in">
                  <?php } elseif ($ps->status == 'cek in') { ?>
                    <input type="hidden" name="status" value="cek out">
                  <?php } ?>

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

            <!-- pesan yg muncul berdasarkan nilai status -->
            <?php if ($ps->status == 'menunggu') { ?>
              <p>Ubah Status Menjadi Cek In?</p>
            <?php } elseif ($ps->status == 'cek in') { ?>
              <p>Ubah Status Menjadi Cek Out?</p>
            <?php } ?>

            <button class="btn btn-success" type="submit">Ya</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>