<?php

$email = "";
$name = "";
$pwd = "";
$errors = "";

// connect to database
$db = mysqli_connect("localhost", "root", "root", "EasyBook");

// if get started button is clicked
if (isset($_POST['submit'])) {
    //$email = "1";
    //$name = "2";
    //$pwd = "3";
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $pwd = mysqli_real_escape_string($db,$_POST['passwd']);

    if (empty($email) || empty($name) || empty($pwd)) {
	$errors = "Must complete all fields.";
	header("Location: index.php?empty-fields");
	exit();
    } else {
	// check for valid name
	if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
	    header("Location: index.php?invalid-name");
	} else {

	    //check for valid email address
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: index.php??invalid-email");
	    } else {
		// make sure email is unique
		$sql = "SELECT * FROM users WHERE user_email='$email'";
		$result = mysqli_query($db, $sql);
		$result_check = mysqli_num_rows($result);

		if ($result_check > 0) {
		    header("Location: index.php?email-already-registered");
		} else {
		    $hashed = password_hash($pwd, PASSWORD_DEFAULT);
		    $sql = "INSERT INTO users (user_email, user_name, user_pwd) VALUES ('$email','$name','$hashed')";
		    mysqli_query($db,$sql);
		    header("Location: registered.php");
		    exit();
		}
	    }
	}
    }
}

mysqli_close($db); // close connection
?>
