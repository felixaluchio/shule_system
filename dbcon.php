<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "test_db";

$conn = mysqli_connect($server, $user,$password,$database);
  if (!$conn) {
    die ("connection error". mysqli_connect_error());
  }


?>