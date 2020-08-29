<?php include('server.php');

if ($_SESSION["loggedIn"] != true) {
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SN | Add Note</title>
	<!-- https://fontawesome.com/how-to-use/on-the-web/referencing-icons/basic-use -->
	<link rel="stylesheet" href="resources/css/fontawesome/all.css" type="text/css">
	<link rel="stylesheet" href="resources/css/mynote.css" type="text/css">

	<style>
		input {
			width: 92%;
			padding: 10px;
			padding-left: 29px;
			border: none;
			background: #eee;

		}

		textarea {
			width: 92%;
			padding: 10px;
			padding-left: 29px;
			border: none;
			background: #eee;
			resize: none;
		}

		/* Phones */
		@media screen and (min-width:320px) and (max-width:443px) {
			.box {
				width: 250px;
				margin-top: 20px;
				margin-bottom: 80PX;
				margin-left: 17px;
			}

			.note {
				width: 210px;
				margin-right: 30px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}

		}

		@media screen and (min-width:444px) and (max-width:539px) {
			.box {
				width: 320px;
				margin-top: 20px;
				margin-bottom: 80PX;
				margin-left: 17px;
			}

			.note {
				width: 280px;
				margin-right: 120px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}
		}

		@media screen and (min-width:540px) and (max-width:680px) {

			.box {
				width: 400px;
				margin-top: 20px;
				margin-bottom: 80PX;
				margin-left: 33px;
			}

			.note {
				width: 360px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}
		}


		@media screen and (min-width:681px) and (max-width:767px) {
			.box {
				width: 550px;
				margin-top: 20px;
				margin-bottom: 80PX;
				margin-left: 23px;
			}

			.note {
				width: 500px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}
		}

		/* Tablets */
		@media screen and (min-width:768px) and (max-width:900px) {

			.box {
				width: 650px;
				margin-top: 20px;
				margin-bottom: 400PX;
				margin-left: 20px;
			}

			.note {
				width: 610px;
				margin-right: 120px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}
		}



		@media screen and (min-width:901px) and (max-width:1024px) {

			.box {
				width: 780px;
				margin-top: 20px;
				margin-bottom: 500PX;
				margin-left: 75px;
			}

			.note {
				width: 740px;
				margin-right: 120px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}
		}



		@media screen and (min-width:1025px) and (max-width:1436px) {

			.box {
				width: 850px;
				margin-top: 20px;
				margin-bottom: 400PX;
				margin-left: 90px;
			}

			.note {
				width: 780px;
				margin-right: 120px;
				margin-bottom: 30PX;
				padding: 10px;
			}

			h3,
			p,
			a {
				padding: 5px;
				margin: 4px;
				border-radius: 5px;
			}

			button .add-btn {
				outline: none !important;
				border: none !important;
				color: red !important;
			}
		}
	</style>
</head>

<body>

	<div class="box">
		<nav>
			<ul>
				<li> <a href="mynotes.php"> <i class="far fa-file-alt"></i> MyNote </a> </li>
				<li> <a id="mynote" href="add_note.php"> <i class="far fa-sticky-note"></i>Add Note</a> </li>
				<li> <a href="edit_info.php"> <i class="far fa-edit"></i>Edit info </a> </li>
				<li> <a href="logout.php"> <i class="fas fa-sign-out-alt"></i>Logout </a> </li>
				<ul>
					<nav>
						<div class="note">
							<form method="POST" action="add_note.php">
								<input type="text" id="" placeholder="Your Title" name="title">
								<br>
								<br>
								<textarea rows="4" cols="50" placeholder="Your Note" name="content"></textarea>
								<button type="submit" name="add-note" class="add-btn" style="padding-right:5px;"><i class="fas fa-plus"></i> Add </button>
							</form>
						</div>
</body>

</html>