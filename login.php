<?php
include("connection_db.php"); // connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start(); // start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Query the database to get the user's data
  $sql = "SELECT * FROM buyer WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // User exists, verify the password
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
      // Create a session variable for the user
      $_SESSION['id_user'] = $row['id_user'];
      session_start();
// authenticate user and set $login_successful variable

      // Redirect the user to the homepage
      header("Location: onecolumn.php");
      exit();
    } else {
      // Display an error message if the password is incorrect
      echo "Incorrect password";
    }
  } else {
    // Display an error message if the email is not found
    echo "Email not found";
  }
}
?>
