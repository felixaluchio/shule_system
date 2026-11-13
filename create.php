<?php
session_start();
require_once "dbcon.php";
include "validation.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $course = trim($_POST['course'] ?? '');

    if (empty($name) || empty($email) || empty($course)) {
        die("All fields are required");
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
    

    $sql = "INSERT INTO student (name, email, course) VALUES (?, ?, ?)";
    try{
    $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $course);
        $result = mysqli_stmt_execute($stmt);
     $_SESSION['message'] = "Student added successfully";
            header("Location: index.php");
            exit ();
    } catch (mysqli_sql_exception $e) {
        error_log("Database error: " . $e->getMessage());
        echo "Something went wrong. Please try again later.";
        exit();
    }
}
