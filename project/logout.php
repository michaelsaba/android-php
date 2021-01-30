<?php 
session_destroy();
	unset($_SESSION["email"]);	
	setcookie("PHPSESSID",session_id(),1,"/");
header("location:home.php");
?>