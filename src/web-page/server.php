<?php

  $email = "";
  $name = "";
  $pwd = "";
  $errors = "";

  // connect to database
  $db = mysqli_connect("localhost", "root", "3283mike", "EasyBook");

  // if get started button is clicked
  if (isset($_POST['submit'])) {
      //$email = "1";
      //$name = "2";
      //$pwd = "3";
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $pwd = mysqli_real_escape_string($db,$_POST['passwd']);

      if (empty($email) || empty($name) || empty($pwd)) {
	  $errors = "*Fill in all the required fields.";
      } else {
	$hashed = md5($pwd);
	$sql = "INSERT INTO users (user_email, user_name, user_pwd) VALUES ('$email','$name','$hashed')";

	if (mysqli_query($db,$sql)) {
	    $errors = "Successful";
	} else {
	    $errors = "Unsuccessful";
	}
      }
  }

  mysqli_close($db); // close connection
?>
