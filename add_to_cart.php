<?php
    // Check if the request is a POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the data from the AJAX request
        $date = $_POST['date'];
        $id_user = $_POST['id_user'];
        $id_item = $_POST['id_item'];

        // Validate and sanitize the data as per your requirements

        // Perform the necessary operations to add the item to the shopping cart
        // For example, you could insert the data into a "shopping_cart" table in the database

        // Connect to the database
        include("connection_db.php"); // connect to the database
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the item into the shopping cart table
        $sql = "INSERT INTO shopping_cart (date, id_user, id_item) VALUES ('$date', '$id_user', '$id_item')";

        if (mysqli_query($conn, $sql)) {
            // Item added successfully, send a response with a success status code
            http_response_code(200);
            echo "Item added to cart!";
        } else {
            // Error occurred while adding the item, send a response with an error status code
            http_response_code(500);
            echo "Error adding item to cart: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Invalid request method, send a response with an error status code
        http_response_code(405);
        echo "Invalid request method";
    }
?>
