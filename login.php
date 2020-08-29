<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SN | Login</title>
	<!-- https://fontawesome.com/how-to-use/on-the-web/referencing-icons/basic-use -->
	<link rel="stylesheet" type="text/css" href="resources/css/fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<style>
		body {
			background-image: url("./resources/images/shield.svg");
			background-repeat: no-repeat;
			background-size: 800px;
		}

		.box {
			height: 375px !important;
		}

		.submit {
			margin: 20px auto 20px !important;
		}

		/* Phones */
		@media screen and (min-width:320px) and (max-width:443px) {
			.box {
				width: 90%;
				margin-top: 110px;
				margin-bottom: 120PX;
				margin-left: 20px;
				margin-right: 5px;
			}

			img {
				margin-top: 105px;
				margin-left: 80px;
			}
		}

		@media screen and (min-width:444px) and (max-width:539px) {
			.box {
				margin-top: 120px;
				margin-bottom: 120PX;
				margin-left: 30px;
				margin-right: 10px;
				border-radius: 20px;
			}

			img {
				margin-top: 115px;
				margin-left: 100px;
			}
		}

		@media screen and (min-width:540px) and (max-width:680px) {
			.box {
				padding-top: 59px;
				padding-bottom: 59px;
				padding-right: 45px;
				padding-left: 45px;
				margin-top: 100px;
				margin-bottom: 100PX;
				margin-left: 90px;
				margin-right: 10px;
			}

			img {
				margin-top: 95px;
				margin-left: 100px;
			}
		}

		@media screen and (min-width:681px) and (max-width:767px) {
			.box {
				margin-top: 110px;
				margin-bottom: 70PX;
				margin-left: 180px;
				margin-right: 10px;
				border-radius: 20px;
			}

			img {
				margin-top: 110px;
				margin-left: 100px;
			}
		}

		/* Tablets  */
		@media screen and (min-width:768px) and (max-width:900px) {
			.box {
				margin-top: 100px;
				margin-bottom: 100PX;
				margin-left: 210px;
				margin-right: 10px;
			}

			img {
				margin-top: 95px;
				margin-left: 100px;
			}
		}

		@media screen and (min-width:901px) and (max-width:1024px) {
			.box {
				margin-top: 100px;
				margin-bottom: 100PX;
				margin-left: 280px;
				margin-right: 10px;
			}

			img {
				margin-top: 95px;
				margin-left: 100px;
			}
		}

		@media screen and (min-width:1025px) and (max-width:1436px) {
			.box {
				margin-top: 150px;
				margin-bottom: 100PX;
				margin-left: 600px;
				margin-right: 10px;
			}

			img {
				margin-top: 145px;
				margin-left: 100px;
			}
		}
	</style>
</head>

<body>



	<p style="color:#112d3d; background-color:#f9e573; padding: 2px; position:absolute; top:450px; left:50px;">All your secrets in one place</p>

	<div class="box">

		<!-- Log in img  -->
		<img src="resources/images/signup.png" alt="image-sign-up">
		<br>
		<form method="POST" action="login.php">
			<div class="form-input">
				<input type="email" placeholder="Enter your Email" name="email" autofocus required>
				<i class="far fa-user"></i>
			</div>
			<div class="form-input">
				<input type="password" placeholder="Enter your password" name="password" autocomplete="on" required>
				<i class="far fa-envelope"></i>
			</div>
			<input class="submit" type="submit" value="Login" name="login">
			<span class="psw">Forgot <a href="forgot_password.php">password?</a></span><br>
			<span class="psw">Don't have an account? Register<a href="register.php"> Here</a></span>

		</form>
	</div>
</body>

</html>