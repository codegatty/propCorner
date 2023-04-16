<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Baxster an Admin Panel Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Baxster Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- font CSS -->
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!--webfonts-->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!--//webfonts-->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
</head>

<body class="login-bg">
	<div class="login-body">
		<div class="login-heading">
			<h1>Login</h1>
		</div>
		<div class="login-info">
			<form method="post">
				<?php include('inc/messages.php');?> 
				<input type="text" class="user" name="email" placeholder="Email" data-validation="required email">
				<input type="password" name="password" class="lock" placeholder="Password" data-validation="required">
				<div class="forgot-top-grids">
					<div class="forgot-grid">
						<ul>
							<li>
								<input type="checkbox" id="brand1" value="">
								<label for="brand1"><span></span>Remember me</label>
							</li>
						</ul>
					</div>
					<div class="forgot">
						<a href="#">Forgot password?</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<input type="submit" name="btn_signin" value="Login">
			</form>
			<?php
			include('connection.php');

			if (isset($_POST['btn_signin'])) {
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$password = mysqli_real_escape_string($con, $_POST['password']);
				

				$query = mysqli_query($con, "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'") or die(mysqli_error($con));
				$row = mysqli_fetch_array($query);
				
				
				
				if ($row) {
					session_start();
					$_SESSION['sessEmail']=$email;

					header('location:home.php?sucess');
				} else {
					echo '<p class="text-danger text-center">Invalid email or password</p>';
				}
			}
			?>
		</div>
	</div>
	<div class="go-back login-go-back">
		<a href="index.html">Go To Home</a>
	</div>
	<div class="copyright login-copyright">
		<p>© 2016 Baxster . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</body>

</html>