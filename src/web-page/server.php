<?php

  $email = "";
  $name = "";
  $pwd = "";
  $errors = "";

  // connect to database
  $db = mysqli_connect('localhost', 'root', '', 'EasyBook');

  // if get started button is clicked
  if (isset($_POST['submit'])) {
      $email = mysql_real_escape_string($_POST['email']);
      $name = mysql_real_escape_string($_POST['name']);
      $pwd = mysql_real_escape_string($_POST['pwd']);

      // ensure form fields are filled correctly
      if (empty($email) || empty ($name) || empty($pwd)) {
	  $errors = "*Fill in all fields.";
      } else {
	  $hashed = md5($pwd);
	  $sql = "INSERT INTO users (email, name, pwd) VALUES ($email, $name, $hashed);
	  mysqli_query($db, $sql);
      }
  }
