<!DOCTYPE HTML>
<html>
	<head>
		<title>Expats relocation</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
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
					<div id="banner">
						<div class="container">
							<div class="row">
								<div class="col-6 col-12-medium">

									<!-- Banner Copy -->
										<p>We specialize in providing relocation services to Mexico</p>
										<a href="#" class="button-large">Learn more</a>

								</div>
								<div class="col-6 col-12-medium imp-medium">

									<!-- Banner Image -->
										<a href="#" class="bordered-feature-image"><img src="images/banner.jpg" alt="" /></a>

								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Features -->
				<section id="features">
					<div class="container">
						<div class="row">
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #1 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic01.jpg" alt="" /></a>
										<h2>Welcome to Halcyonic</h2>
										<p>
											This is <strong>Halcyonic</strong>, a free site template
											by <a href="http://twitter.com/ajlkn">AJ</a> for
											<a href="http://html5up.net">HTML5 UP</a>. It's responsive,
											built on HTML5 + CSS3, and includes 5 unique page layouts.
										</p>
									</section>

							</div>
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #2 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic02.jpg" alt="" /></a>
										<h2>Responsive You Say?</h2>
										<p>
											Yes! Halcyonic is built to be fully responsive so it looks great
											at every screen size, from desktops to tablets to mobile phones.
										</p>
									</section>

							</div>
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #3 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic03.jpg" alt="" /></a>
										<h2>License Info</h2>
										<p>
											Halcyonic is licensed under the <a href="http://html5up.net/license">CCA</a> license,
											so use it for personal/commercial use as much as you like (just keep
											our credits intact).
										</p>
									</section>

							</div>
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #4 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
										<h2>Volutpat etiam aliquam</h2>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse
											eu varius nibh. Suspendisse vitae magna mollis.
										</p>
									</section>

							</div>
						</div>
					</div>
				</section>

			<!-- Content -->
				<section id="content">
					<div class="container">
						<div class="row aln-center">
							<div class="col-4 col-12-medium">

								<!-- Box #1 -->
									<section>
										<header>
											<h2>Who We Are</h2>
											<h3>We are a mexican startup to help expats from all over the world to relocate</h3>
										</header>
										<a href="#" class="feature-image"><img src="images/pic05.jpg" alt="" /></a>
										<p>
											We have observed a growing interest among expatriates to live in Mexico.  At our company, we prioritize transparency, honesty, and fair pricing. We strive to provide a trustworthy service to expats seeking to relocate to Mexico, ensuring that they have a seamless and stress-free experience
										</p>
									</section>

							</div>
							<div class="col-4 col-6-medium col-12-small">

								<!-- Box #2 -->
									<section>
										<header>
											<h2>What We Do</h2>
											<h3>Facilitate your life</h3>
										</header>
										<ul class="check-list">
											<li>Visa process</li>
											<li>Help you start your business</li>
											<li>Help you do your taxes</li>
											<li>Find services near your area</li>
											<li>Buy & rent property</li>
											<li>Spanish language classes</li>
										</ul>
									</section>

							</div>
							<div class="col-4 col-6-medium col-12-small">

								<!-- Box #3 -->
									<section>
										<header>
											<h2>What People Are Saying</h2>
											<h3>And a final subheading about our clients</h3>
										</header>
										<ul class="quote-list">
											<li>
												<img src="images/pic06.jpg" alt="" />
												<p>"Neque nisidapibus mattis"</p>
												<span>Jane Doe, CEO of UntitledCorp</span>
											</li>
											<li>
												<img src="images/pic07.jpg" alt="" />
												<p>"Lorem ipsum consequat!"</p>
												<span>John Doe, President of FakeBiz</span>
											</li>
											<li>
												<img src="images/pic08.jpg" alt="" />
												<p>"Magna veroeros amet tempus"</p>
												<span>Mary Smith, CFO of UntitledBiz</span>
											</li>
										</ul>
									</section>

							</div>
						</div>
					</div>
				</section>

			<!-- Footer -->
				<section id="footer">
					<div class="container">
						<div class="row">
							<div class="col-8 col-12-medium">

								<!-- Links -->
									<section>
										<h2>Links to Important Stuff</h2>
										<div>
											<div class="row">
												<div class="col-3 col-12-small">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="col-3 col-12-small">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="col-3 col-12-small">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="col-3 col-12-small">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
											</div>
										</div>
									</section>

							</div>
							<div class="col-4 col-12-medium imp-medium">

								<!-- Blurb -->
									<section>
										<h2>An Informative Text Blurb</h2>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu
											varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi,
											dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh
											lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
										</p>
									</section>

							</div>
						</div>
					</div>
				</section>

			<!-- Copyright -->
				<div id="copyright">
					&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>