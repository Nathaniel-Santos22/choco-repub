<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "choco_repub";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
   //echo "<script>alert('Connected');</script>";
?>