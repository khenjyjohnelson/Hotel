<img src="img/hotel.jpg" class="img-fluid rounded">

<form action="<?= site_url('pesanan/tambah') ?>" method="post">

  <!-- form ini berisi data yang sudah diinput sebelumnya dari halaman home -->
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek In</label>
        <input class="form-control" type="date" required name="cek_in" value="<?= $cek_in ?>">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="cek_out" value="<?= $cek_out ?>">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Jumlah Kamar</label>
        <input class="form-control" type="number" required name="jlh" min="1" max="10" value="<?= $jlh ?>">
      </div>
    </div>
  </div>

  <h2>Pesan Kamar Anda</h2>
  <hr>
  <div class="row justify-content-start mt-4">
    <div class="col-md-6">

      <!-- menentukan id_user jika user sudah membuat akun atau belum -->
      <div class="form-group">
        <label>Pemesan</label>
        <input class="form-control" type="text" required name="pemesan" placeholder="Masukkan nama pemesan" value="<?= $this->session->userdata('nama') ?>">
        <?php if ($this->session->userdata('id_user')) { ?>
          <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
        <?php } else { ?>

          <!-- value 0 di id_user untuk pengguna tanpa akun -->
          <input type="hidden" name="id_user" value="0">

        <?php } ?>
      </div>

      <!-- keterangan * di bawah -->
      <div class="form-group">
        <label>Email*</label>
        <input class="form-control" type="text" required name="email" placeholder="Masukkan email" value="<?= $this->session->userdata('email') ?>">
      </div>

      <div class="form-group">
        <label>Nomor Telepon</label>
        <input class="form-control" type="text" required name="hp" placeholder="Masukkan nomor telepon" value="<?= $this->session->userdata('hp') ?>">
      </div>

      <div class="form-group">
        <label>Tamu</label>
        <input class="form-control" type="text" required name="tamu" placeholder="Masukkan nama tamu">
      </div>

      <div class="form-group">
        <label>Tipe</label>
        <select class="form-control" required name="tipe">
          <option selected hidden value="">Pilih Tipe Kamar...</option>
          <?php foreach ($kamar as $k) : ?>
            <option><?= $k->tipe; ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <button class="btn btn-success" onclick="return confirm('Apakah Anda Ingin Memesan Kamar?')" type="submit">Konfirmasi Pesanan</button>
        <a class="btn btn-danger" type="button" href="<?= site_url('welcome') ?>">Batal</a>
      </div>

      <!-- keterangan * -->
      <small>*Email perlu diingat untuk melakukan reservasi</small>
      
    </div>

    <div class="col-md-6">
      <img class="img-fluid rounded" src="img/book.png">
    </div>
  </div>
</form>