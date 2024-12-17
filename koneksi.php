<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "toko";

// Create connection
$conn = new mysqli($servername, $username, $password, $toko);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>