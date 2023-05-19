<?php
include("connection_db.php"); // connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

    $name = $_GET['name'];
    $description = $_GET['description'];
    // Do something with $name and $description...
?>
