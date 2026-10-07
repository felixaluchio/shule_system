<?php
session_start();
include "dbcon.php";

if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
} else {
  $message = "";
}

if (!empty($message)) {
  echo htmlspecialchars($message);
}



$studentsPerPage = 10;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$page = filter_var($page, FILTER_VALIDATE_INT);

if ($page === false) {
  $page = 1;
}
if ($page < 1) {
  $page = 1;
}


//search
if (isset($_GET['search'])) {
  $search = trim($_GET['search']);
   if(strlen($search) > 100){
    $search = substr($search, 0, 100);
    
   }
} else {
  $search = "";
}

$searchTerm = "%" . $search . "%";

$sql = "SELECT COUNT(*) AS total FROM student  WHERE name LIKE ? OR email LIKE ? OR course LIKE ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $searchTerm, $searchTerm, $searchTerm);
mysqli_stmt_execute($stmt);
$countResult = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($countResult);
$totalStudents = $row["total"];
$totalPages = ceil($totalStudents / $studentsPerPage);

if ($page > $totalPages && $totalPages > 0) {
  $page = $totalPages;
}

$offset = ($page - 1) * $studentsPerPage;

if (isset($_GET['sort'])){
    $sort = $_GET['sort'];
  }else{
    $sort = "name";
  }

if(!in_array($sort, ["name","email","course"])){
  $sort = "name";
}

if (isset($_GET['order'])){
  $order = $_GET['order'];
}else{
  $order = "asc";
}
if(!in_array($order, ["asc","desc"])){
  $order = "asc";
}
$sql = "SELECT * FROM student WHERE name LIKE ? OR email LIKE ? OR course LIKE ? ORDER BY $sort $order LIMIT ? OFFSET ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssii", $searchTerm, $searchTerm, $searchTerm, $studentsPerPage, $offset);
mysqli_stmt_execute($stmt);
$studentResult = mysqli_stmt_get_result($stmt);

if (!$studentResult) {
  echo "Failed to retrieve students";
  exit();
}

echo "<h1>Student Management System</h1>";
echo "<br>";

echo "<a href='form.php'>Add Student</a>";
echo "<br>";


echo "<form action='index.php' method='get'>";
echo "<input type='text' name='search' value='" . htmlspecialchars($search) . "'>";
echo "<button type='submit'>Search</button>";
echo "</form>";

echo "<form action = 'index.php' method = 'get'>";
echo "<input type='hidden' name='search' value='". htmlspecialchars($search) ."'>";
echo "<label>Sort By: </label>";
echo "<select name = 'sort'>";
echo "<option value ='name'" . ($sort == "name" ? " selected" : "") . ">name</option>";
echo "<option value ='email'" . ($sort == "email" ? " selected" : "") . ">email</option>";
echo "<option value ='course'" . ($sort == "course" ? " selected" : "") . ">course</option>";
echo "</select>";
echo  "<label>Order: </label>";
echo "<select name = 'order'>";
echo "<option value='asc'" . ($order == "asc" ? " selected" : "") . ">Ascending</option>";
echo "<option value='desc'" . ($order == "desc" ? " selected" : "") . ">Descending</option>";
echo "</select>";  

echo "<button type='submit'>Sort</button>";
echo "</form>";

if (mysqli_num_rows($studentResult) > 0) {

  echo "<table border='1'>";

  echo "<tr>";
  echo "<th>id</th>";
  echo "<th>name</th>";
  echo "<th>email</th>";
  echo "<th>course</th>";
  echo "<th>Actions</th>";
  echo "</tr>";

  while ($student = mysqli_fetch_assoc($studentResult)) {

    echo "<tr>";

    echo "<td>" . htmlspecialchars($student["id"]) . "</td>";
    echo "<td>" . htmlspecialchars($student["name"]) . "</td>";
    echo "<td>" . htmlspecialchars($student["email"]) . "</td>";
    echo "<td>" . htmlspecialchars($student["course"]) . "</td>";

    echo "<td>";

    echo "<a href='edit.php?id=" . $student["id"] . "'>Edit</a>";

    echo "<a href='delete.php?id=" . $student["id"] . "'
        onclick=\"return confirm('Are you sure you want to delete this student?');\">
        Delete
        </a>";

    echo "</td>";

    echo "</tr>";
  }

  echo "</table>";

  if ($page > 1) {
    $previousPage = $page - 1;
    echo "<a href='index.php?search=" . urlencode($search) . "&page=$previousPage&sort=". urlencode($sort). "&order=". urlencode($order). "'>Previous</a>&nbsp;";
  }

  for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $page) {
      echo "<strong>$i</strong>";
    } else {
      echo "<a href = 'index.php?search=" . urlencode($search) . "&page=$i&sort=". urlencode($sort) . "&order=" .urlencode($order). "'>&nbsp;" . $i . "&nbsp;</a>";
    }
  }

  if ($page < $totalPages) {
    $nextPage = $page + 1;
    echo "&nbsp;<a href='index.php?search=" . urlencode($search) . "&page=$nextPage&sort=". urlencode($sort). "&order=". urlencode($order). "'>Next</a>";
  }

  
} else {
    if ($search != "") {
        echo "No student found matching " . htmlspecialchars($search);
    } else {
        echo "No students found";
    }
}
