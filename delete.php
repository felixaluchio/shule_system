<?php
include "dbcon.php";
if(!isset($_GET['id'])){
  echo "ID is required";
  exit();
}
$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id = ?";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$id);
$result = mysqli_stmt_execute($stmt);
if($result){
  header("Location: index.php");
}else{
  echo "student not deleted: ".mysqli_stmt_error($stmt);
}

?>