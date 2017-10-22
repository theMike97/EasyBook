<?php session_start() ?>

<!DOCTYPE html>
<html lang="en-US">

    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Easybook online finance manager</title>
    </head>

    <body>
	<div class="container">
	    <h1>Home</h1>
	    <form action="logout.php" method="POST">
		<button type="submit" name="logout">Log out</button>
	    </form>
	    <h2>User information</h2>
	    <ul>
		<p>Name: <?php echo $_SESSION['u_name']; ?><br />
		   Email: <?php echo $_SESSION['u_email']; ?>
		</p>
	    </ul>
	</div>
    </body>

</html>
