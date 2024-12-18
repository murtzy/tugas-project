<?php
require 'session.php';
require '../koneksi.php';

$queryProduk = mysqli_query($conn, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Produk</title>
</head>
<body>
  <?php require 'navbar.php'; ?>

  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          Home
        </li>
        <li class="breadcrumb-item active" aria-current="">
          Produk
        </li>
      </ol>
    </nav>


    <!-- Tambah produk -->
    <div class="my-5 col-12 col-md-6">
      <h3>Tambah Produk</h3>

      <form enctype="multipart/form-data" action="" method="post">
        <label for="nama">Nama</label>
        <input required type="text" id="nama" name="nama" class="form-control" autocomplete="off">
        <label for="harga">Harga</label>
        <input required type="number" id="harga" name="harga" class="form-control">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto">
        <label for="detail">Detail</label>
        <textarea name="detail" id="detail"></textarea>
        <label for="stok">Stok</label>
        <select name="stok" id="stok" class="form-control">
          <option value="tersedia">Tersedia</option>
          <option value="habis">Habis</option>
        </select>

        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
      </form>

      <?php 
      if(isset($_POST('simpan'))) {
        $nama = htmlspecialchars($_POST('nama'));
        $harga = htmlspecialchars($_POST('harga'));
        $detail = htmlspecialchars($_POST('detail'));
        $stok = htmlspecialchars($_POST('stok'));
        

        $target_dir = "../image/";
        $nama_file = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $nama_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $image_size = $_FILES["foto"]["size"];
        $max_size = 10000000; // 10MB

        // if ($nama_file) {
        //   if ($image_size > $max_size) {
        //     echo "<div class='alert alert-warning mt-3' role='alert'>File tidak boleh lebih dari 10Mb</div>";
        //   } else {
        //     if($imageFileType!= "jpg" && $imageFileType!= "png" && $imageFileType!= "jpeg") {
        //       echo "<div class='alert alert-warning mt-3' role='alert'>File harus bertipe jpg, png, jpeg</div>";
        //     } else {
        //       move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
        //     }
        //   }
        // }
      }
      ?>
    </div>

    <div class="mt-5">
      <h2>List Produk</h2>

      <div class="table-responsive mt-5">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Stok</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(!$jumlahProduk) {
            ?>
            <tr class="text-center" colspan="4">Data Produk Tidak Tersedia</tr>
            <?php } else {
              $jumlah = 1;
              while($data = mysqli_fetch_array($queryProduk)) :
                
            ?>
              <td><?= $jumlah ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['harga'] ?></td>
              <td><?= $data['stok'] ?></td>
            <?php
              $jumlah++;
              endwhile;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>