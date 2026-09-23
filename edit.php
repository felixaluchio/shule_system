<?php
include "dbcon.php";
 
if(!isset($_GET['id'])){
  echo "ID is required";
  exit();
}

$id = $_GET['id'];
 $sql = "SELECT * FROM student WHERE id = ?";
 $stmt = mysqli_prepare($conn,$sql);
 mysqli_stmt_bind_param($stmt,"i",$id);
 $result = mysqli_stmt_execute($stmt);
 $result = mysqli_stmt_get_result($stmt);
 if(mysqli_num_rows($result)>0){
 $student = mysqli_fetch_assoc($result);
 echo "<html>";
 echo "<form action ='update.php' method = 'post'>";
 
 echo "<input type='hidden' name='id' value='" .htmlspecialchars($student['id']) . "'>";
 
 echo "<label>Name:</label>";
 echo "<input type='text' name='name' value='" .htmlspecialchars($student['name']) . "'>";
 echo"<br>";
 echo "<label>Email: </label>";
 echo "<input type='email' name='email' value='".htmlspecialchars($student["email"])."'>";
 echo"<br>";
 echo "<label>Course: </label>";
 echo "<input type='text' name='course' value='".htmlspecialchars($student["course"])."'>";
 echo "<button type = 'submit' name = 'submit'>Submit</button>";
echo "</form>";
 echo "</html>";
 }else{
  echo "Student ID not found";
 }
?>