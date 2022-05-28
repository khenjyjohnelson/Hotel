<?php foreach ($pengaturan as $p) : ?>
  <img src="img/<?= $p->foto ?>" class="img-fluid rounded">
<?php endforeach; ?>


<!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
<form action="<?= site_url('welcome/pemesanan') ?>" method="get">
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek In</label>
        <input class="form-control" type="date" required name="cek_in">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="cek_out">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Jumlah Kamar</label>
        <input class="form-control" type="number" required name="jlh" min="1" max="10" value="1">
      </div>
    </div>

    <div class="col-md-1">
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Pesan</button>
      </div>
    </div>
  </div>
</form>

<?php foreach ($pengaturan as $p) : ?>
  <h1 class="text-center">Tentang Kami</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= $p->metadesc ?></p>
    </div>

    <div class="col-md-6">
      <img class="img-fluid rounded" src="img/mark.png">
    </div>
  </div>
<?php endforeach ?>