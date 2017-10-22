<?php
session_start();

$mincome = "";
$aid = "";
$allowance = "";
$other = "";

$db = mysqli_connect("localhost", "root", "root", "EasyBook");

if (isset($_POST['calculate'])) {

    $mincome = mysqli_real_escape_string($db,$_POST['mincome']);
    $aid = mysqli_real_escape_string($db,$_POST['aid']);
    $allowance = mysqli_real_escape_string($db,$_POST['allowance']);
    $other = mysqli_real_escape_string($db,$_POST['otherincome']);

    if (empty($mincome) || empty($aid) || empty($allowance) || empty($other)) {
	header("Location: home.php?fields=empty");
	exit();
    } else {

	$mincomef = floatval($mincome);
	$aidf = floatval($aid);
	$allowancef = floatval($allowance);
	$otherf = floatval($other);

	$totalIncome = $mincomef + $aidf + $allowancef + $otherf;

	$update_id = $_SESSION['u_id'];

	$sql = "UPDATE users SET income='$mincomef', aid='$aidf', allowance='$allowancef', other_income='$otherf', total_income='$totalIncome' WHERE user_id=$update_id";
	mysqli_query($db,$sql);
	header("Location: home.php?");
    }
} else {
    header("Location: home.php?fail");
    exit();
}
mysqli_close($db);
