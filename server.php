<?php
session_start();

$name = "";
$email = "";
$password = "";
$passwordconf = "";
// keep track of registration errors 
$errors = array();

// Connect to the database
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "sn_db");
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


// User Registration
if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordconf = mysqli_real_escape_string($conn, $_POST['passwordconf']);

    // check if user email is used
    $user_email_check = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_email_check);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['email'] === $email) {
            array_push($error, "email already exists");
        }
    }

    // if there is no errors during the process then insert the user to db
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "INSERT INTO users(name,email,password)  VALUES('$name', '$email', '$password') ";
        mysqli_query($conn, $query);
        $_SESSION['email'] = $email;
        $_SESSION["loggedIn"] = true;
        header('location: mynotes.php');
    }
}


// User login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION["loggedIn"] = true;
            header('location: mynotes.php');
        } else {
            array_push($errors, "Wrong email/password");
            echo "<script> alert('Wrong email/password') </script>";
        }
    }
}


// Add-note
if (isset($_POST['add-note'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    if (empty($title)) {
        array_push($errors, "Title can't be empty");
    }
    if (empty($content)) {
        array_push($errors, "Content can't be empty");
    }

    if (count($errors) == 0) {
        $email = $_SESSION['email'];
        $query = "INSERT INTO notes(title,content,userID)  VALUES('$title', '$content','$email') ";
        $results = mysqli_query($conn, $query);
        header('location: mynotes.php');
    } else {
        echo "<script> alert('Check your input') </script>";
    }
}


// Edit personal information
if (isset($_POST['edit-info'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $currentPassword = mysqli_real_escape_string($conn, $_POST['curr-password']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new-password']);

    if (empty($name)) {
        array_push($errors, "Name can't be empty");
    }
    if (empty($currentPassword)) {
        array_push($errors, "Current password can't be empty");
    }
    if (empty($newPassword)) {
        array_push($errors, "New password can't be empty");
    }
    if (count($errors) == 0) {
        $session_email = $_SESSION['email'];
        $query = "SELECT * FROM users where email = '$session_email'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_array($result);
        echo '<h1>' . $rows['password'] . '</h1>';
        echo '<h1>' . md5($currentPassword) . '</h1>';

        if ($rows['password'] == 'md5(' . md5($currentPassword) . ')') {
            $hashedNewPassword = md5($newPassword);
            $query = "UPDATE users SET name = '$name', password = 'md5($hashedNewPassword)' where email = '$session_email'";
            $results = mysqli_query($conn, $query);
            header('location: mynotes.php');
        } else {
            echo "<script> alert('Password not correct') </script>";
        }
    }
}

// Recover Password
if (isset($_POST['recover-password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new-password']);
    $confPassword = mysqli_real_escape_string($conn, $_POST['conf-password']);

    if (empty($email)) {
        array_push($errors, "Email can't be empty");
    }
    if (empty($newPassword)) {
        array_push($errors, "New password can't be empty");
    }
    if (empty($confPassword)) {
        array_push($errors, "Confirm password can't be empty");
    }
    if (count($errors) == 0) {
        $query = "SELECT * FROM users where email = '$email'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_array($result);

        if ($rows['email'] == $email) {
            $newPassword = md5($newPassword);
            $query = "UPDATE users SET password = '$newPassword' where email = '$email'";
            $results = mysqli_query($conn, $query);
            header('location: login.php');
        } else {
            echo '<h1> Error</h1>';
        }
    }
}
