<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/home.css" style="text/css">
	<title>Easybook online finance manager</title>
    </head>

    <body>
	<div class="container">
	    <div class="top">
	        <h1>Welcome <?php echo $_SESSION['u_name']; ?></h1>
	        <form action="logout.php" method="POST">
		    <button type="submit" name="logout">Log out</button>
	        </form>
	    </div>
	    <div class="budget">
		<form class="fields" action="calculate.php" method="POST">
		    <h2>Monthly Income</h2>	
		    <table class="table">
			<tr>
			    <th>Item</th>
			    <th>Amount</th>
			</tr>
			<tr>
			    <td>Estimated monthly income</td>
			    <td><input type="text" class="inputField" name="mincome" value=<?php echo "" . $_SESSION['mincome']; ?>></td>
			</tr>
			<tr>
			    <td>Financial aid</td>
			    <td><input type="text" class="inputField" name="aid" value=<?php echo $_SESSION['aid']; ?>></td>
			</tr>
			<tr>
			    <td>Allowance</td>
			    <td><input type="text" class="inputField" name="allowance" value=<?php echo $_SESSION['allow']; ?>></td>
			</tr>
			<tr>
			    <td>Other income</td>
			    <td><input type="text" class="inputField" name="otherincome" value=<?php echo $_SESSION['other']; ?>></td>
			</tr>
			<tr>
			    <th>Total</th>
			    <th>$<?php echo $_SESSION['tot_income']; ?></th>
			</tr>
		    </table>

		    <h2>Monthly Expenses</h2>
		    <table class="table">
		    </table>

		    <h2>Monthly Semester Costs</h2>
		    <table class="table">
		    </table>

		    <h2>Overview</h2>
		    <table class="table">
		    </table>
		    <button type="submit" class="btn" name="calculate">Calculate</button>
		</form>
	    </div>
	</div>
    </body>

</html>
