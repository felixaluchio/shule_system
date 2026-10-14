<?php
session_start();
require_once "dbcon.php";
include "validation.php";

if(isset($_POST['submit'])){

$id = $_POST['id'];
$name = trim($_POST['name']);
$email = $_POST['email'];
$course = trim($_POST['course']);

$emailError = validateEmail($email);
  if($emailError){
    die($emailError);
  }

  $courseError = validateCourse($course);
  if($courseError){
    die($courseError);
  }


if (empty($name) || empty($email) || empty($course)) {
  echo "All fields must be filled";
  exit();
}

$sql = "UPDATE student SET name = ?, email = ?, course = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $course, $id);
$result = mysqli_stmt_execute($stmt);
if ($result) {
  $_SESSION['message'] = "student updated successfully";
  header("Location: index.php");
  exit();
} else {
  echo "Update failed: " . mysqli_stmt_error($stmt);
}

}