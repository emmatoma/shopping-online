<!DOCTYPE HTML>
<html>

<head>
	<title>Expats relocation</title>
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
					<div class="col-9 col-12-medium">

						<!-- Main Content -->
						<section>
							<header>
								<h2>Summary</h2>
								<!-- Display items-->
								<?php
								include("connection_db.php"); // connect to the database
								// Connect to the database
								$conn = mysqli_connect($servername, $username, $password, $dbname);

								// Check for connection errors
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								if (isset($_SESSION['id_user'])) {
									$id_user = $_SESSION['id_user'];

									// Retrieve items from shopping cart for the logged-in user
									$sql = "SELECT * FROM shopping_cart WHERE id_user = '$id_user'";
									$result = mysqli_query($conn, $sql);
									// Check if the "Eliminate" button is pressed
									if (isset($_POST['eliminate'])) {
										$id_item = $_POST['id_item'];
										$id_user = $_SESSION['id_user'];

										// Delete the matching record from shopping_cart table
										$deleteQuery = "DELETE FROM shopping_cart WHERE id_user = '$id_user' AND id_item = '$id_item' LIMIT 1";
										mysqli_query($conn, $deleteQuery);

										// Refresh the page
										header("Refresh: 0");
									}

									// Calculate the total price
									$totalPrice = 0;

									// Display the items in the desired format
									while ($row = mysqli_fetch_assoc($result)) {
										$id_item = $row['id_item'];

										// Retrieve the item details from the "item" table
										$itemQuery = "SELECT name, price FROM item WHERE id_item = '$id_item'";
										$itemResult = mysqli_query($conn, $itemQuery);
										$itemRow = mysqli_fetch_assoc($itemResult);

										echo '<section id_item="' . $row['id_item'] . '">';
										echo '<header>';
										echo '<h2>' . $itemRow['name'] . '</h2>';
										echo '</header>';
										echo '<h4> $' . $itemRow['price'] . ' MXN</h4>';
										echo '<form method="post" action="">';
										echo '<input type="hidden" name="id_item" value="' . $row['id_item'] . '">';
										echo '<button type="submit" name="eliminate" class="button-small">Eliminate</button>';
										echo '</form>';
										echo '</section>';

										// Accumulate the item price for calculating the total price
										$totalPrice += $itemRow['price'];
									}

									// Check if the total price is 0
									if ($totalPrice == 0) {
										echo '<h3>No items in the cart</h3>';
									} else {
										echo '<h3>Total Price: $' . $totalPrice . ' MXN</h3>';
										echo '<form method="post" action=""><button type="submit" name="checkout" class="button-large">Checkout</button></form>';
									}
									// Check if the checkout button is clicked
									if (isset($_POST['checkout'])) {
										// Get the current date
										$currentDate = date('Ymd');

										// Generate the id_history using id_user and current date
										$id_user = $_SESSION['id_user'];
										$id_history = $id_user . $currentDate;

										// Insert values into the target table
										$insertQuery = "INSERT INTO history (id_history, id_user, id_item, date, price) 
											SELECT '$id_history', sc.id_user, sc.id_item, CURDATE(), i.price
											FROM shopping_cart AS sc
											JOIN item AS i ON sc.id_item = i.id_item
											WHERE sc.id_user = '$id_user'";
									  mysqli_query($conn, $insertQuery);
							-         mysqli_query($conn, $insertQuery);
										$deleteQuery = "DELETE FROM shopping_cart WHERE id_user = '$id_user'";
										mysqli_query($conn, $deleteQuery);
										    // Redirect the page to itself
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
									}
								}

								// Close the database connection
								mysqli_close($conn);
								?>
							</header>

						</section>

					</div>
					<div class="col-3 col-12-medium">
					</div>
				</div>
			</div>
		</section>


	</div>

	<!-- Scripts -->
	<script>function deleteCartItem(cartItemId) {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {
					console.log(xhr.responseText); // log the response from the server
				}
			};
			xhr.open('POST', 'deleteCartItem.php', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send('cart_item_id=' + cartItemId); // send the cart_item_id to the server
		}
	</script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>