<?php
include "dbcon.php";
try {
    $sql = "SELECT * FROM student";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_execute($stmt);

} catch(mysqli_sql_exception $e) {

    echo "A database error occurred.";

}

?>