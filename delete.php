<?php
session_start();
require_once "dbcon.php";
if(!isset($_GET['id'])){
  echo "ID is required";
  exit();
}
$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id = ?";
try{
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$id);
$result = mysqli_stmt_execute($stmt);
}catch(mysqli_sql_exception $e){
  error_log("Database error: ". $e->getMessage());

  echo "Something went wrong. Please try again later.";
  exit();
}


  $_SESSION['message'] = "Student deleted successfully";
  header("Location: index.php");
  

?>