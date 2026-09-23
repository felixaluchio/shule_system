<?php
include "dbcon.php";

$id = $_POST['id'];
$name = trim($_POST['name']);
if (preg_match("[0-9]", $name)) {
    echo "Invalid name";
    exit();
}
if (strlen($name) < 3) {
      echo "The name should have at least three characters";
      exit();
    }
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if($email===false){
  echo"Invalid email address";
  exit();
}

$course = trim($_POST['course']);
if(preg_match("[^A-Za-z .]",$course)){
echo "Invalid course";
exit();
}

if(empty($name)||empty($email)||empty($course)){
  echo "All fields must be filled";
  exit();
}

$sql = "UPDATE student SET name = ?, email = ?, course = ? WHERE id = ?";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"sssi",$name,$email,$course,$id);
$result = mysqli_stmt_execute($stmt);
if($result){
  header("Location: index.php");

}else{
  echo "Update failed: ".mysqli_stmt_error($stmt);
}
?>