<?php
require "koneksi.php";
// require "session.php";

$queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Es Teh Online | Home</title>
  <style>
  </style>
</head>
<style>
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

.banner {
  height: 80vh;
  background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('./image/banner.jpg');
  background-position: center;
  background-size: cover;
}

.full {
  width: 100%;
}

.no-decoration {
  text-decoration: none;
  color: white;
}

.no-decoration:hover {
  color: #eec373;
}

.text-harga {
  font-size: 22px;
  color: #ca965c;
}

.image-box {
  height: 250px;
}

.image-box img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: center;
}

.content-subscribe {
  background-color: rgba(0,0,0,0.7);
}

.content-subscribe a {
  color: #fff;
}
</style>
<body>
  <?php require "navbar.php"; ?>

    <!-- banner -->
  <div class="container-fluid banner d-flex align-items-center">
  <div class="container text-center text-white">
    <h1>Toko Esteh</h1>
    <h3>Mau Minum Apa?</h3>
    <div class="col-md-8 offset-md-2">
      <form method="get" action="produk.php">
        <div class="input-group input-group-lg my-4">
          <input type="text" class="form-control" placeholder="Nama Minuman"
          arial-label="Nama Minuman" aria-describedby="basic-addon2" name="keyword">
          <button type=submit class="btn warna2 text-white">Cari</button>
        </div>
      </form>
    </div>
  </div>
  </div>

  <!-- Kategori -->
  <div class="container-fluid py-5">
    <!-- Produk -->
    <div class="container-fluid py-5">
      <div class="container text-center">
        <h3>Produk</h3>

        <div class="row mt-5">
          <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
          <div class="col-sm-6 col-md-4 mb-3">
            <div class="card h-100">
              <div class="image-box">
                  <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="..." style="height: 100%; width: 100%; object-fit: cover;">
              </div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                <a href="beli.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 text-white full">Beli</a>
              </div>
            </div>
          </div> 
          <?php } ?>
        </div>
        <a href="produk.php" class="btn btn-outline-warning mt-3">See More</a>
      </div>
    </div>
  
  <!-- Tentang Kami -->
  <div class="container-fluid warna3 py-5">
      <div class="container text-center"">
        <h3>Tentang Kami</h3>
        <p class="fs-5">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere, nisi vitae consectetur fermentum, velit velit vulputate velit, in consectetur risus lacus ac nunc. Donec sit amet libero nec turpis eleifend mollis. Sed consectetur, ipsum sit amet ultricies viverra, mauris purus varius massa, in dapibus dolor purus vel felis. Donec euismod ligula non libero faucibus, ac ultricies neque sagittis. Maecenas vel diam in massa consectetur ullamcorper. Duis vel justo et turpis pulvinar consectetur.
        </p>
      </div>
    </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>