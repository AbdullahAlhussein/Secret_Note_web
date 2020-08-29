<?php include('server.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SN | Forgot Password</title>
	<!-- https://fontawesome.com/how-to-use/on-the-web/referencing-icons/basic-use -->
	<link rel="stylesheet" type="text/css" href="resources/css/fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<style>
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

		/* Tablets */
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
				margin-left: 400px;
				margin-right: 10px;

			}

			img {
				margin-top: 145px;
				margin-left: 100px;
			}
		}

		.box {
			height: 400px !important;
		}

		.submit {
			margin: 20px auto 20px !important;
		}

		form {
			margin-top: 50px !important;
		}

		.far {
			padding-top: 3px !important;
		}
	</style>
</head>

<body>

	<div class="box">
		<!-- image and text sign up -->
		<img src="resources/images/forgot-password.png" alt="image-sign-up">
		<!-- Form information  -->
		<form method="POST" action="forgot_password.php">
			<p> Recover your password </p>
			<div class="form-input">
				<input type="email" placeholder="Enter your email" name="email" autofocus required>
				<i class="far fa-envelope"></i>
			</div>
			<div class="form-input">
				<input type="password" placeholder="New Password" name="new-password" autofocus required>
				<i class="fas fa-lock"></i>
			</div>
			<div class="form-input">
				<input type="password" placeholder="Confirm New Password" name="conf-password" autofocus required>
				<i class="fas fa-lock"></i>
			</div>
			<input class="submit" type="submit" value="submit" name="recover-password">
		</form>
	</div>

</body>

</html>