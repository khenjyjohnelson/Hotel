<?php if ($this->session->userdata('akses') <> 'administrator') {
  redirect(site_url('welcome/no_akses'));
} ?>

<h1>Daftar User Hotel</h1>
<hr>
<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>

<table class="table table-light" id="data">
  <thead class="thead-light">
    <tr>
      <th>Id User</th>
      <th>Nama User</th>
      <th>Email</th>
      <th>Hp</th>
      <th>Level</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($user as $u) : ?>
      <tr>
        <td><?= $u->id_user; ?></td>
        <td><?= $u->nama ?></td>
        <td><?= $u->email ?></td>
        <td><?= $u->hp ?></td>
        <td><?= $u->level ?></td>
        <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $u->id_user; ?>">
        <i class="fas fa-eye"></i></a>
          <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $u->id_user; ?>">
        <i class="fas fa-edit"></i></a>
          <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="<?= site_url('user/hapus/' . $u->id_user) ?>">
        <i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

  <tfoot>
    <tr>
      <th>Id User</th>
      <th>Nama User</th>
      <th>Email</th>
      <th>Hp</th>
      <th>Level</th>
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>

<!-- modal tambah -->
<div id="tambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah User</h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url('user/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="nama" placeholder="Masukkan nama">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="email" required name="email" placeholder="Masukkan email">
          </div>

          <!-- administrator dapat menentukan password untuk akun baru -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="password" placeholder="Masukkan password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi password">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="hp" placeholder="Masukkan hp">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-users"></i></span>
            </div>

            <!-- hanya admin yang bisa menentukan level user -->
            <select class="form-control" required name="level">
              <option value="" selected hidden>Pilih Level User</option>
              <option value="tamu">Tamu</option>
              <option value="resepsionis">Resepsionis</option>
              <option value="administrator">Administrator</option>
            </select>
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
<?php foreach ($user as $u) : ?>
  <div id="ubah<?= $u->id_user; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User <?= $u->id_user; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url('user/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="nama" value="<?= $u->nama; ?>">
              <input type="hidden" name="id_user" value="<?= $u->id_user; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="email" required name="email" value="<?= $u->email; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input class="form-control" type="text" required name="hp" value="<?= $u->hp; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <select class="form-control" required name="level">
                <option selected hidden><?= $u->level; ?></option>
                <option value="tamu">Tamu</option>
                <option value="resepsionis">Resepsionis</option>
                <option value="administrator">Administrator</option>
              </select>
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
<?php foreach ($user as $u) : ?>
  <div id="lihat<?= $u->id_user; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">User <?= $u->id_user; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama User : </label>
              <p><?= $u->nama; ?></p>
            </div>

            <div class="form-group">
              <label>Email : </label>
              <p><?= $u->email; ?></p>
            </div>

            <div class="form-group">
              <label>Hp : </label>
              <p><?= $u->hp; ?></p>
            </div>

            <div class="form-group">
              <label>Level User : </label>
              <p><?= $u->level; ?></p>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>