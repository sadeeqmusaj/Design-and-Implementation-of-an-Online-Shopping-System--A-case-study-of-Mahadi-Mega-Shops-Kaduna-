 <?php
include("conn/conn.php");
	$_SESSION["user_id"] = "";
	$_SESSION["user_email"] = "";
	$_SESSION["user_city"] = "";
header("Location:login.php");
?>