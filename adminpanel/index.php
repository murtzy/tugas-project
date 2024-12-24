<?php 
  require 'session.php';
  require '../koneksi.php';

  $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
  $jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Home</title>
  <style>
    a {
      text-decoration: none;
      color: black;
    }

    .produk {
      background-color: royalblue;
    }
  </style>
</head>
<body>
  <?php require "navbar.php" ?>
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          Home
        </li>
      </ol>
    </nav>
  </div>
  <h2>Halo <?= $_SESSION['username'] ?></h2>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4 produk d-flex p-2">
        <div class="row">
          <div class="col-12 text-white">
            <h3 class="fs-2">Produk</h3>
            <p class="fs-5"><?= $jumlahProduk ?> Produk</p>
            <a href="produk.php" class="text-white fs-5">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>