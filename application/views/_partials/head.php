<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($pengaturan as $p) : ?>
    <title><?= $title ?> - <?= $p->nama ?></title>

    <!-- menampilkan favicon -->
    <link rel="icon" href="img/<?= $p->favicon ?>" type="image/gif">
    
  <?php endforeach; ?>
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">

  <!-- css untuk datatables bertema bootstrap -->
  <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">

  <!-- css pribadi -->
  <link rel="stylesheet" href="css/style.css">
</head>