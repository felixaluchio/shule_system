# Student Management System

A beginner-friendly **PHP and MySQL student management system** built to practice backend development and database operations.

The project implements the basic **CRUD (Create, Read, Update, Delete)** operations and includes validation, prepared statements, search, and pagination.

## Features

* Add new students
* View all students
* Edit student information
* Delete students
* Search students by:

  * Name
  * Email
  * Course
* Pagination for student records
* Form validation
* Prepared SQL statements
* Basic error handling
* Confirmation before deleting a student
* HTML output escaping using `htmlspecialchars()`

## Technologies Used

* PHP
* MySQL
* HTML
* XAMPP
* MySQLi
* Git & GitHub

## Project Structure

```text
student_crud/
│
├── dbcon.php       # Database connection
├── form.php        # Form for adding students
├── create.php      # Handles creating students
├── index.php       # Displays, searches, and paginates students
├── edit.php        # Displays the edit form
├── update.php      # Handles updating students
└── delete.php      # Handles deleting students
```

## Database

The project uses a MySQL database called:

```text
shule_db
```

The main table is:

```text
student
```

### Student Table

| Column   | Description             |
| -------- | ----------------------- |
| `id`     | Unique student ID       |
| `name`   | Student's name          |
| `email`  | Student's email address |
| `course` | Student's course        |

The `id` column should be configured as the **primary key** and **AUTO_INCREMENT**.

## Database Connection

The database connection is handled in:

```text
dbcon.php
```

Example configuration:

```php
$server = "localhost";
$user = "root";
$password = "";
$database = "shule_db";
```

Make sure your MySQL server is running before using the application.

## Running the Project Locally

### 1. Install XAMPP

Install XAMPP and make sure the following services are running:

* Apache
* MySQL

### 2. Clone the Repository

Clone the project into your XAMPP `htdocs` directory.

For example:

```text
C:\xampp\htdocs\student_crud
```

### 3. Create the Database

Open phpMyAdmin and create:

```text
shule_db
```

Then create the `student` table with the required columns.

### 4. Configure the Database Connection

Open:

```text
dbcon.php
```

and make sure the database name is:

```text
shule_db
```

### 5. Open the Application

In your browser, visit:

```text
http://localhost/student_crud/index.php
```

## CRUD Flow

The application follows this basic flow:

```text
form.php
   ↓
create.php
   ↓
MySQL database
   ↓
index.php
   ↓
edit.php / delete.php
   ↓
update.php / delete.php
   ↓
MySQL database
```

### Create

The user enters student information in `form.php`.

The information is sent to `create.php` using the `POST` method.

`create.php` validates the data and inserts it into the database using a prepared statement.

### Read

`index.php` retrieves students from the database and displays them in a table.

It also handles:

* Searching
* Pagination

### Update

The user clicks **Edit**, which sends the student's ID to `edit.php`.

The student's existing information is retrieved and displayed in a form.

The updated information is then sent to `update.php`, which updates the corresponding database record.

### Delete

The user clicks **Delete**.

A confirmation message is displayed before `delete.php` removes the selected student from the database.

## Security Practices Practiced

This project also introduces some basic security practices:

* Prepared statements to reduce SQL injection risks
* Input validation
* `htmlspecialchars()` when displaying database values in HTML
* Confirmation before deleting records
* Validation of page numbers and search parameters

## Learning Objectives

This project was built as a practical exercise to understand:

* PHP and MySQL integration
* Database connections
* CRUD operations
* SQL `SELECT`, `INSERT`, `UPDATE`, and `DELETE`
* Prepared statements
* `GET` and `POST` requests
* Form validation
* Search functionality
* Pagination
* Basic backend application structure
* Handling data between the browser, PHP, and MySQL

## Current Status

The core student management functionality is working.

Future improvements may include:

* User authentication and login
* Session management
* Improved UI and styling
* Better error and success messages
* CSRF protection
* Database relationships
* More structured application architecture

## Author

**Felix Aluchio**

This project is part of my practical learning journey in **PHP, MySQL, and backend development**.
