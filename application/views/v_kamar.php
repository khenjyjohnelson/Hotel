<!-- menampilkan fasilitas kamar sesuai dengan tipe kamar yang ada
https://stackoverflow.com/questions/30531359/nested-foreach-in-codeigniter-view
https://stackoverflow.com/questions/22354514/message-trying-to-get-property-of-non-object-in-codeigniter
terima kasih pada link di atas -->

<?php foreach ($kamar as $k) : ?>
  <img src="img/kamar/<?= $k->img ?>" class="img-fluid rounded">
  <h2 class="pt-2">Tipe <?= $k->tipe; ?></h2>
  <ul class="list-unstyled ml-2">
    <li>Fasilitas : </li>
    <?php foreach ($faskamar as $fk) : ?>
      <?php if ($k->tipe === $fk->tipe) { ?>
        <li><?= $fk->nama ?></li>
      <?php } ?>
    <?php endforeach; ?>
  </ul>
<?php endforeach; ?>