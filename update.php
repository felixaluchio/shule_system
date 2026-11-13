<?php
session_start();
require_once "dbcon.php";
include "validation.php";

if(isset($_POST['submit'])){

$id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$course = trim($_POST['course']);

if($id === false || $id < 1){
  echo "Invalid ID";
  exit();
}


if (empty($name) || empty($email) || empty($course)) {
  echo "All fields must be filled";
  exit();
}

$nameError = validateName($name);
  if($nameError){
    die($nameError);
  }
$emailError = validateEmail($email);
  if($emailError){
    die($emailError);
  }

  $courseError = validateCourse($course);
  if($courseError){
    die($courseError);
  }



$sql = "UPDATE student SET name = ?, email = ?, course = ? WHERE id = ?";
try{$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $course, $id);
$result = mysqli_stmt_execute($stmt);
}catch(mysqli_sql_exception $e){
  error_log("Database error: ". $e->getMessage());
  echo "Something went wrong. Please try again later.";
  exit();
}


  $_SESSION['message'] = "student updated successfully";
  header("Location: index.php");
  exit();

}