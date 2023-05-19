

<?php
require_once('connection_db.php');
$conn = mysqli_connect($servername, $username, $password, $dbname);

// include("connection_db.php");///connect db
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$payment = $_POST["payment"];
	$password = $_POST["password"];
	$address = $_POST["address"];
	// Escape special characters to prevent SQL injection
	$name = mysqli_real_escape_string($conn, $name);
	$email = mysqli_real_escape_string($conn, $email);
	$payment = mysqli_real_escape_string($conn, $payment);
	$password = mysqli_real_escape_string($conn, $password);
	$address = mysqli_real_escape_string($conn, $address);

	// Insert the user data into the buyer table
	$sql = "INSERT INTO buyer ( name, email, payment, password, address)
			VALUES ( '$name', '$email', '$payment', '$password', '$address')";

	if (mysqli_query($conn, $sql)) {
		// Redirect the user to a thank-you page
		header("Location: onecolumn.php");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>
