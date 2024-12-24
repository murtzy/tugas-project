<!-- <?php 
require 'koneksi.php';

// get produk by search
if(isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");

  // get produk default
} else {
  $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);

?> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous" />
    <title>Es Teh Online | Produk</title>
  </head>
  <style>
    .banner {
      height: 50vh;
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
        url("./image/banner.jpg");
      background-position: center;
      background-size: cover;
    }

    .full {
      width: 100%;
    }

    .warna1 {
  background-color: #876445;
}

.warna2 {
  background-color: #ca965c;
}

.warna3 {
  background-color: #eec373;
}

.warna4 {
  background-color: #f4dfba;
}

.warna-beli {
  background: salmon;
}
  </style>
  <body>
    <?php require 'navbar.php'; ?>

    <div class="container-fluid banner d-flex align-items-center">
      <div class="container">
        <h1 class="text-white text-center">Produk</h1>
      </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-12">
          <h3>List Produk</h3>
          <div class="row">
            <?php 
            if (!$countData) {
              echo "<p>Produk kosong.</p>";
            }
            while($produk = mysqli_fetch_array($queryProduk)) :?>
            <div class="col-md-3 mb-4">
              <div class="card h-100">
                  <div class="image-box" style="height: 250px; width: 100%; overflow: hidden;">
                      <img src="image/<?= $produk['foto']; ?>" class="card-img-top" alt="..." style="height: 100%; width: 100%; object-fit: cover;">
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?= $produk['nama']; ?></h4>
                    <p class="card-text text-truncate"><?= $produk['detail']; ?></p>
                    <p class="card-text text-harga">Rp <?= $produk['harga']; ?></p>
                    <a href="beli.php?nama=" class="btn warna2 text-white full">Beli</a>
                  </div>
              </div>
            </div>
            <?php endwhile;?>
          </div>
        </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>
</html>
