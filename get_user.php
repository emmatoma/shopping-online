<?php
include("connection_db.php"); // connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start(); // start the session

include 'get_user_name.php';

if(isset($name)) {
    echo "<a href='onecolumn.php'>$name</a>";
} else {
    echo "<a href='onecolumn.php'>DISPLAY</a>";
}

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the user's name from the database
session_start();
if(isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  $sql = "SELECT name FROM buyer WHERE name='$name'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
  }
}

mysqli_close($conn);
?>

