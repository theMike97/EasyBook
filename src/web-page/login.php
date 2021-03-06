<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Easybook online finance manager</title>
</head>

<body>
  <div class="container">
    <div class="background">
      <div class="panel">
	<div class="logo"></div>

	<div class = "content">

	  <div class="slogan">
	      <h1>Making finances <span>easy</span>, <span>fast</span>, and <span>free</span></h1>
	  </div>
	<div class="divider"></div>

	<div class="register">
	  <h2>Log In</h2>
	</div>

	  <form class="fields" action="login-server.php" method="POST">

	    <div class="entry">
	      <input type="text" class = large-fld name="email" value="" placeholder="Email">
	    </div>

	    <div class="entry">
	      <input type="password" class = large-fld name="passwd" value="" placeholder="Password">
	    </div>

	    <div class="entry">
	      <input type="submit" class = large-btn name="submit" value="Log in">
	    </div>

	    <div class="entry">
	      <p>Don't have an account? Register <a href="index.php"> here</a>.</p>
	    </div>

          </form>

	</div>
      </div>
    </div>
  </div>

</body>

</html>

