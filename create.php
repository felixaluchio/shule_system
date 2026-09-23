<?php
 include "dbcon.php";

if(isset($_POST['submit'])){
$name = trim($_POST['name']);
 if( preg_match("[0-9]", $name)){
    echo "Invalid name";
    exit();
  }
 if(strlen($name) < 3){
  echo "The name should have at least three characters";
      exit();
 }

$email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);   
   if($email===false){
    echo "Invalid email address";
    exit();
   }

$course = trim($_POST['course']);
 if(strlen($course)<3){
  echo "Course must have at least three characters";
  exit();
 }
 if (preg_match("[^A-Za-z .]",$course)) {
  echo "invalid Course";
  exit();
 }

  if(empty($name)||empty($email)||empty($course)){
    echo "All fields are required";
    exit();
  }
  $sql = "INSERT INTO student(name,email,course)VALUES(?,?,?)";
  $stmt = mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,"sss",$name,$email,$course);
  $result = mysqli_stmt_execute($stmt);

  if($result){
    header("Location: index.php");
  }else{
    echo "Submission failed: " . mysqli_stmt_error($stmt);
}
}

?>