<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="subpage">
	<div id="page-wrapper">

		<!-- Header -->
		<section id="header">
			<div class="container">
				<div class="row">
					<div class="col-12">

						<!-- Logo -->
						<h1><a href="index.php" id="logo">Expats relocation</a></h1>

						<!-- Nav -->
						<nav id="nav">
							<a href="index.php">Homepage</a>
							<a href="threecolumn.php">Services</a>
							<?php
							session_start();
							if (isset($_SESSION['id_user'])) {
								// User is logged in, show "Log out" option
								echo '<a href="twocolumn1.php">Payment</a>';
								echo '<a href="logout.php">Log out</a>';
							} else {
								// User is not logged in, show "Log in" option
								echo '<a href="onecolumn.php">Log in</a>';
							}
							?>
						</nav>

					</div>
				</div>
			</div>
		</section>

		<!-- Content -->
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-3 col-12-medium">
					</div>
					<div class="col-6 col-12-medium imp-medium">
						<?php
						// Connect to the database
						include("connection_db.php"); // connect to the database
						$conn = mysqli_connect($servername, $username, $password, $dbname);

						// Check connection
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						// Query the database to retrieve the items
						$sql = "SELECT * FROM item";
						$result = mysqli_query($conn, $sql);

						// Display the items in the desired format
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<section id_item="' . $row['id_item'] . '">';
							echo '<header>';
							echo '<h2>' . $row['name'] . '</h2>';
							echo '<h3>' . $row['description'] . '</h3>';
							echo '</header>';
							echo '<h4> $' . $row['price'] . ' MXN</h4>';
							if (isset($_SESSION['id_user'])) {
								// Show "Book now" button
								$id_user = $_SESSION['id_user'];
								$date = date('Y-m-d');
								$id_item = $row['id_item']; // Assuming $row contains the item details
								echo '<a href="#" class="button-large" onclick="addToCart(\'' . $date . '\', \'' . $id_user . '\', \'' . $id_item . '\')">Book now</a>';

							} else {
								// User is not logged in, show alert to log in first
								echo '<button class="button-large" onclick="alert(\'Please log in to book.\')">Book now</button>';
							}

							echo '</section>';
						}

						// Close the database connection
						mysqli_close($conn);
						?>

						<script>
							function addToCart(date, id_user, id_item) {
								var xhr = new XMLHttpRequest();
								xhr.onreadystatechange = function () {
									if (xhr.readyState === XMLHttpRequest.DONE) {
										if (xhr.status === 200) {
											// Success, do something if needed
											alert("Item added to cart!");
										} else {
											// Error handling
											alert("Error adding item to cart!");
										}
									}
								};
								xhr.open("POST", "add_to_cart.php", true);
								xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhr.send("date=" + date + "&id_user=" + id_user + "&id_item=" + id_item);
							}
						</script>

						<!-- Create a service -->
						<?php
						// Connect to the database
						include("connection_db.php"); // connect to the database
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						if (isset($_SESSION['id_user'])) {
							// User is logged in, check if their name is "admin"
							$id_user = $_SESSION['id_user'];
							$query = "SELECT name FROM buyer WHERE id_user = $id_user";
							$nameResult = mysqli_query($conn, $query);
							$nameRow = mysqli_fetch_assoc($nameResult);
							$name = $nameRow['name'];

							if ($name == 'admin') {
								// User is logged in and their name is "admin", display the input form
								echo '<section>'; // Open a new section for the inputs
								echo '<h2>Agregar producto</h2>';
								echo '<form method="POST" action="">'; // Add the form tag and empty action attribute
								echo '<input type="text" name="input1" placeholder="Name"><br>';
								echo '<input type="text" name="input2" placeholder="Description"><br>';
								echo '<input type="number" name="input3" placeholder="Price" min="0" step="1"><br>';
								echo '<button type="submit" name="submit">Create</button>'; // Add the submit button with the name "submit"
								echo '</form>'; // Close the form
								echo '</section>'; // Close the section for the inputs
						
								if (isset($_POST['submit'])) {
									// Process the form data
									$input1 = $_POST['input1'];
									$input2 = $_POST['input2'];
									$input3 = $_POST['input3'];

									if (!empty($input1) && !empty($input2) && !empty($input3)) {
										// Prepare and execute the SQL statement to insert the data into the "item" table
										$sql = "INSERT INTO item (name, description, price) VALUES ('$input1', '$input2', '$input3')";
										if (mysqli_query($conn, $sql)) {
											echo "Data inserted successfully.";
											// Redirect the page to itself
											header("Location: " . $_SERVER['PHP_SELF']);
											exit();
										} else {
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
										}
									} else {
										echo "Please fill in all the fields.";
									}
								}
							}
						}

						mysqli_close($conn);
						?>
						<!-- Update -->
						<?php
						// Connect to the database
						include("connection_db.php"); // connect to the database
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						if (isset($_SESSION['id_user'])) {
							// User is logged in, check if their name is "admin"
							$id_user = $_SESSION['id_user'];
							$query = "SELECT name FROM buyer WHERE id_user = $id_user";
							$nameResult = mysqli_query($conn, $query);
							$nameRow = mysqli_fetch_assoc($nameResult);
							$userName = $nameRow['name'];

							if ($userName == 'admin') {
								// User is logged in and their name is "admin", display the input for the item name
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
									// Process the form data
									$itemName = $_POST['item_name'];

									// Check if the item exists in the database
									$query = "SELECT * FROM item WHERE name = '$itemName'";
									$result = mysqli_query($conn, $query);

									if (mysqli_num_rows($result) > 0) {
										// Item exists, display the inputs for the new name, description, and price
										$row = mysqli_fetch_assoc($result);
										$itemId = $row['id_item']; // Get the item ID for updating the row
										$itemDescription = $row['description'];
										$itemPrice = $row['price'];

										echo '<section>'; // Open a new section for the inputs
										echo '<h2>Update Item</h2>';
										echo '<form method="POST" action="">'; // Add the form tag and empty action attribute
										echo '<input type="hidden" name="item_id" value="' . $itemId . '">'; // Hidden input for item ID
										echo '<input type="text" name="new_name" placeholder="New Name" value="' . $itemName . '"><br>';
										echo '<input type="text" name="new_description" placeholder="Description" value="' . $itemDescription . '"><br>';
										echo '<input type="number" name="new_price" placeholder="Price" min="0" step="1" value="' . $itemPrice . '"><br>';
										echo '<button type="submit" name="update">Update</button>'; // Add the submit button with the name "update"
										echo '</form>'; // Close the form
										echo '</section>'; // Close the section for the inputs
									} else {
										echo "Item not found.";
									}
								} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
									// Process the form data for updating the item
									$itemId = $_POST['item_id'];
									$newName = $_POST['new_name'];
									$newDescription = $_POST['new_description'];
									$newPrice = $_POST['new_price'];

									// Update the corresponding row in the database
									$updateQuery = "UPDATE item SET name = '$newName', description = '$newDescription', price = $newPrice WHERE id_item = $itemId";

									if (mysqli_query($conn, $updateQuery)) {
										echo "Item updated successfully.";
										// Redirect the page to itself
										header("Location: " . $_SERVER['PHP_SELF']);
										exit();
									} else {
										echo "Error updating item: " . mysqli_error($conn);
									}
								}

								echo '<section>'; // Open a new section for the input
								echo '<h2>Enter Item Name</h2>';
								echo '<form method="POST" action="">'; // Add the form tag and empty action attribute
								echo '<input type="text" name="item_name" placeholder="Item Name"><br>';
								echo '<button type="submit" name="submit">Look Up</button>'; // Add the submit button with the name "submit"
								echo '</form>'; // Close the form
								echo '</section>'; // Close the section for the input
							}
						}

						mysqli_close($conn);
						?>
						<!-- erase item -->
						<?php
						// Connect to the database
						include("connection_db.php"); // connect to the database
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						if (isset($_SESSION['id_user'])) {
							// User is logged in, check if their name is "admin"
							$id_user = $_SESSION['id_user'];
							$query = "SELECT name FROM buyer WHERE id_user = $id_user";
							$nameResult = mysqli_query($conn, $query);
							$nameRow = mysqli_fetch_assoc($nameResult);
							$userName = $nameRow['name'];

							if ($userName == 'admin') {
								// User is logged in and their name is "admin", display the input for the item name
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
									// Process the form data
									$itemName = $_POST['item_name'];

									// Check if the item exists in the database
									$query = "SELECT * FROM item WHERE name = '$itemName'";
									$result = mysqli_query($conn, $query);

									if (mysqli_num_rows($result) > 0) {
										// Item exists, delete the item row
										$deleteQuery = "DELETE FROM item WHERE name = '$itemName'";
										if (mysqli_query($conn, $deleteQuery)) {
											echo "Item deleted successfully.";
											// Redirect the page to itself
											echo '<script>window.location.href = window.location.href;</script>';
										
										exit();
										} else {
											echo "Error deleting item: " . mysqli_error($conn);
										}
									} else {
										echo "Item not found.";
									}
								}

								echo '<section>'; // Open a new section for the input
								echo '<h2>Delete Item</h2>';
								echo '<form method="POST" action="">'; // Add the form tag and empty action attribute
								echo '<input type="text" name="item_name" placeholder="Item Name"><br>';
								echo '<button type="submit" name="delete">Delete</button>'; // Add the submit button with the name "submit"
								echo '</form>'; // Close the form
								echo '</section>'; // Close the section for the input
							}
						}

						mysqli_close($conn);
						?>

					</div>
				</div>
			</div>
	</div>
	</section>
	</div>


	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>