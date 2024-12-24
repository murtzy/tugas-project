<?php 
require "session.php";
require "../koneksi.php";

$id = $_GET['p'];
$query = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id' ");

$data = mysqli_fetch_array($query);

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString.= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Detail Produk</title>
</head>

  <body>
    <?php require 'navbar.php'; ?>
    <div class="container mt-5">
      <h2>Detail Produk</h2>

      <div class="col-12 col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
          <label for="nama">Nama</label>
          <input required type="text" id="nama" name="nama" value="<?= $data['nama']?>" class="form-control" autocomplete="off">
          <label for="harga">Harga</label>
          <input required type="number" id="harga" name="harga" value="<?= $data['harga'] ?>" class="form-control">

          <div>
            <label for="current-foto">Foto Produk</label> <br>
            <img src="../image/<?= $data['foto'] ?>" alt="" width="300">
          </div>
          <label for="foto">Foto (max. 10MB) </label>
          <input type="file" class="form-control" name="foto" id="foto">
          <label for="detail">Detail</label> <br>
          <textarea name="detail"  id="detail">
            <?= $data['detail'] ?>
          </textarea> <br>
          <label for="stok">Stok</label>
          <select name="stok" id="stok" class="form-control">
            <option value="<?= $data['stok'] ?>"><?= $data['stok'] ?></option>
            <?php 
            if ($data['stok'] == 'tersedia') {
              echo '<option value="habis">Habis</option>';  
            } else {
              echo '<option value="Tersedia">Tersedia</option>';
            }
            ?>
          </select>

          <button type="submit" name="update" class="btn btn-primary">Update</button>
          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
          <a href="produk.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['update'])) {
          $nama = htmlspecialchars($_POST['nama']);
          $harga = htmlspecialchars($_POST['harga']);
          $detail = htmlspecialchars($_POST['detail']);
          $stok = htmlspecialchars($_POST['stok']);

          $target_dir = "../image/";
          $nama_file = basename($_FILES["foto"]["name"]);
          $target_file = $target_dir . $nama_file;
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $image_size = $_FILES["foto"]["size"];
          $randomString = generateRandomString(8);
          $new_name = $randomString . ".". $imageFileType;
          $max_size = 10000000; // 10MB

          if ($nama === '' || $harga === '') {
            echo '<div class="alert alert-warning" role="alert">Nama dan Harga harus diisi!</div>';
          } else {
            $queryUpdate = mysqli_query($conn, "UPDATE produk SET nama = '$nama', harga = '$harga', detail = '$detail', stok = '$stok' WHERE id = '$id'");
            
            if ($nama_file != '') {
              if ($image_size > $max_size) {
                echo '<div class="alert alert-warning" role="alert">Foto yang diupload melebihi batas maksimal 10MB!</div>';
                return;
              }
              if ($imageFileType!= "jpg" && $imageFileType!= "png" && $imageFileType!= "jpeg") {
                echo '<div class="alert alert-warning" role="alert">Hanya format JPG, JPEG, dan PNG yang dapat diupload!</div>';
                return;
              }

              move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
              $queryUpdate = mysqli_query($conn,"UPDATE produk SET foto = '$new_name' WHERE id='$id'");

              if ($queryUpdate) {
                echo '
                <div class="alert alert-success" role="alert">Data berhasil diupdate!</div>
                
                <meta http-equiv="refresh" content="2; url=produk.php" />
                ';
                
              } else {
                echo '<div class="alert alert-warning" role="alert">Data gagal diupdate!</div>';
              }
              
            }
          }
        }

        if(isset($_POST['hapus'])) {
          $queryHapus = mysqli_query($conn, "DELETE FROM produk WHERE id = '$id'");

          if ($queryHapus) {
            echo '
            <div class="alert alert-success" role="alert">Data berhasil dihapus!</div>
            
            <meta http-equiv="refresh" content="2; url=produk.php" />
            ';
          }
        }
        ?>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>