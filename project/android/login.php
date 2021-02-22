<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username =htmlspecialchars( $_POST['email']);
    $password = htmlspecialchars($_POST['password']);
		
	$sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
	require_once('aconf.php');
	$result=mysqli_query($conn,$sql);

	if($result){
	echo"Data Matched";}
	else{
	echo"failure";}
}
	

?>