<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
	$name=htmlspecialchars($_POST['name']);
	$lname=htmlspecialchars($_POST['lname']);
	$phone=htmlspecialchars($_POST['phone']);
	$email=htmlspecialchars($_POST['email']);
	$password=htmlspecialchars($_POST['password']);
	$attribute=htmlspecialchars($_POST['attribute']);
	if($attribute = "helpseeker"){
	$sql = "INSERT INTO users(id,name,lname,phone,email,password,attribute) VALUES (NULL,'$name','$lname','$phone','$email','$password','0')";
	}
	else if($attribute="requestresponder"){
	$sql = "INSERT INTO users(id,name,lname,phone,email,password,attribute) VALUES (NULL,'$name','$lname','$phone','$email','$password','1')";
	}
	require_once('aconf.php');
	$result=mysqli_query($conn,$sql);

	if($result){
	echo"Data Matched";}
	else{
	echo"failure";}
	
	
	}



?>