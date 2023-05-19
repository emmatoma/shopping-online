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
                                    <h1><a href="index.html" id="logo">Expats relocation</a></h1>
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
                            <div class="col-12">
                                <!-- Main Content -->
                                <section>
                                    <header>
                                        <h2>Create your account</h2>
                                        <h3>A generic one column layout</h3>
                                    </header>
                                    <form method="post" action="send_user.php">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" required>
                               
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                               
                                        <label for="payment">Payment:</label>
                                        <input type="number" id="payment" name="payment" required>
                               
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" minlength="10" required>
                               
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" name="address" required>
                               
                                        <input type="submit" value="Submit">
                                    </form>
                                </section>
                                <section>
                                    <header>
                                        <h2>Already have an account?</h2>
                                        <h3>Log in!</h3>
                                    </header>
                                    <form method="post" action="login.php">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                       
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" minlength="10" required>
                               
                                        <input type="submit" value="Submit">
                                    </form>
                                </section>


                            </div>
                        </div>
                    </div>
                </section>
        </div>
        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
    </body>
</html>