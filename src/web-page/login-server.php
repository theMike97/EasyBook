<?php

session_start();

$email = "";
$name = "";
$pwd = "";

$db = mysqli_connect("localhost", "root", "root", "EasyBook");

// if log in is clicked
if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pwd = mysqli_real_escape_string($db, $_POST['passwd']);

    // error handlers
    // check if inputs are empty
    if (empty($email) || empty($pwd)) {
	header("Location: login.php?login=empty");
	exit();
    } else {
	$sql = "SELECT * FROM users WHERE user_email='$email'";
	$result = mysqli_query($db, $sql);
	$check = mysqli_num_rows($result);

	if ($check < 1) {
	    header("Location: login.php?login=error");
	    exit();
	} else {
	    if ($row = mysqli_fetch_assoc($result)) {
		// dehash pwd
		$hashed_check = password_verify($pwd, $row['user_pwd']);
		if ($hashed_check == false) {
		    header("Location: login.php?login=error");
		    exit();
		} elseif ($hashed_check == true) {
		    // log in user
		    $_SESSION['u_id'] = $row['user_id'];
		    $_SESSION['u_email'] = $row['user_email'];
		    $_SESSION['u_name'] = $row['user_name'];
		    $_SESSION['u_pwd'] = $row['user_pwd'];
		    header("Location: home.php?login=success");
		    exit();
		}
	    }
	}
    }

} else {
    header("Location: index.php?login-server=error");
    exit();
}
