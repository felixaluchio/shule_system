# Student Management System

A beginner-friendly Student Management System built with PHP and MySQL.  
The project demonstrates the fundamental concepts of backend development, database interaction, CRUD operations, data validation, search, and pagination.

## Features

- Add new students
- View all students
- Edit existing student records
- Delete student records
- Search students by:
  - Name
  - Email
  - Course
- Pagination for student records
- Form validation
- Prepared SQL statements
- Confirmation prompt before deleting a student
- HTML output escaping using `htmlspecialchars()`
- Redirects after successful create, update, and delete operations
- Basic error handling

## Technologies Used

- PHP
- MySQL
- HTML
- XAMPP
- MySQLi
- Git & GitHub

## Project Structure

```text
student_crud/
│
├── dbcon.php       # Database connection
├── form.php        # Form for adding a student
├── create.php      # Handles creation of student records
├── index.php       # Displays, searches and paginates students
├── edit.php        # Displays the edit form
├── update.php      # Handles student updates
└── delete.php      # Handles student deletion
