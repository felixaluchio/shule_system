<?php
session_start();
require_once "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $course = trim($_POST['course'] ?? '');

    if (empty($name) || empty($email) || empty($course)) {
        die("All fields are required");
    }

    if (preg_match("/[0-9]/", $name) || strlen($name) < 3) {
        die("Invalid name: must be at least 3 characters and contain no numbers");
    }

    if (!$email) {
        die("Invalid email address");
    }

    if (strlen($course) < 3 || preg_match("/[^A-Za-z .]/", $course)) {
        die("Invalid course: must be at least 3 characters and contain only letters, spaces, and periods");
    }

    $sql = "INSERT INTO student (name, email, course) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $course);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['message'] = "Student added successfully";
            header("Location: index.php");
            exit();
        } else {
            die("Submission failed: " . mysqli_stmt_error($stmt));
        }
        
        mysqli_stmt_close($stmt);
    } else {
        die("Database error: could not prepare statement");
    }
}
