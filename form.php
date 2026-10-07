<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action = "create.php" method="POST">
  <label>Name: </label>
  <input type = "text" name = "name" placeholder = "Name" required><br>
  <label>Email: </label>
  <input type = "email" name = "email" placeholder = "Email" required><br>
  <label>Course: </label>
  <input type = "text" name = "course" placeholder = "Course" required><br>
  <button type="submit" name="submit">Add Student</button>
</form>
</body>
</html>