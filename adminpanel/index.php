<?php 
  require 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    a {
      text-decoration: none;
      color: black;
    }
  </style>
</head>
<body>
  <h2>Halo <?= $_SESSION['username'] ?></h2>
  <button><a href="logout.php">Logout</a></button>
</body>
</html>