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
	<title>SN| My Notes</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- https://fontawesome.com/how-to-use/on-the-web/referencing-icons/basic-use -->
	<link rel="stylesheet" href="resources/css/fontawesome/all.css" type="text/css">
	<link rel="stylesheet" href="resources/css/mynote.css" type="text/css">
	<style>
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
			a,
			button {
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
			a,
			button {
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
		}
	</style>
</head>

<body>

	<div class="box">
		<nav>
			<ul>
				<li> <a id="mynote" href="mynotes.php"> <i class="far fa-file-alt"></i> My Notes </a> </li>
				<li> <a href="add_note.php"> <i class="far fa-sticky-note"></i>Add Note </a> </li>
				<li> <a href="edit_info.php"> <i class="far fa-edit"></i>Edit info </a> </li>
				<li> <a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout </a> </li>
				<ul>
		</nav>

		<?php
		$conn = new mysqli("localhost", "root", "root", "sn_db");

		$email = $_SESSION['email'];
		$query = "SELECT * FROM notes where userID = '$email' order by created desc";
		$result = mysqli_query($conn, $query);

		while ($notes = mysqli_fetch_assoc($result)) {
			$title = $notes["title"];
			$content = $notes["content"];
			$noteID = $notes["id"];
			$created = $notes["created"];
			echo '<div class="note">';
			echo '<h3>' . $title . '</h3>';
			echo '<p>' . $content . '</p>';
			echo "<form action='mynotes.php'>
            <i class='far fa-edit'><input type='submit' name='edit' value='Edit' style=' padding:5px; outline:none; border:none; background-color: rgba(0,0,0,0.0);'></i>
            <i class='far fa-trash-alt'><input type='submit' name='delete' value='Delete' style=' padding:5px; outline:none; border:none; background-color: rgba(0,0,0,0.0);'></i>
			<input type = 'text' name = 'nID' value = '" . $noteID . "' hidden> 
			</form>";
			echo "<h4 style='margin-left: 450px;margin-top:-30px;'> Added on: " . $created . "</h4>";

			echo '</div>';
		}
		if (isset($_GET['edit'])) {
			$noteID = $_GET['nID'];
			echo "<script type='text/javascript'> window.location = 'edit_note.php?id=" . $noteID . "' </script>";
		}
		if (isset($_GET['delete'])) {
			$noteID = $_GET['nID'];
			$query = "DELETE FROM notes where id = '$noteID'";
			if ($conn->query($query) === TRUE) {

				echo '<script type="text/javascript">
         				  window.location = "mynotes.php"
     					 </script>';
			} else {
				echo "Error deleting record: " . $conn->error;
			}
		}

		?>

</body>

</html>