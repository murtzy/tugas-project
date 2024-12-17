<?php 
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$database = "toko";

// Create connection
$conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>