<?php
session_start();
session_destroy();
unset($_SESSION['email']);
$_SESSION['message'] = "You are now logged out";
$_SESSION["loggedIn"] = false;
header("location: login.php");
