<?php
session_start();
require '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<style>
  .main {
    height: 100vh;
  }

  .login-box {
    width: 500px;
    height: 300px;
    /* border: 1px solid black; */
    box-sizing: border-box;
    border-radius: 10px;
  }
</style>
<body>
  <div class="main d-flex flex-column justify-content-center align-items-center">
    <div class="login-box p-4 shadow">
      <form action="" method="post">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" id="username">

        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">

        <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
      </form>
    </div>

    <div class="mt-3 text-center" style="width: 500px;">
    <?php
      if (isset($_POST['loginbtn'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        $countData = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);

        if ($countData > 0) {
          if (password_verify($password, $data['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data["username"];
            header('location: index.php');
            exit(); // Tambahkan exit setelah header
          } else {
            echo "<div role='alert' class='alert alert-warning'>Password is incorrect</div>";
          }
        } else {
          echo "<div role='alert' class='alert alert-warning'>Username or password is incorrect</div>";
        }

      }
    ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>