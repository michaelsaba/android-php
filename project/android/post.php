<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	$text = htmlspecialchars($_POST['text']);
	$email=htmlspecialchars($_POST['email']);
	$attribute=htmlspecialchars($_POST['attribute']);
	if($attribute=="helpseeker"){
		$sql = "INSERT INTO posts(post_id,text,attribute,email,posted_at) VALUES(NULL,'$text','0','$email',curtime())";
	}
	else if($attribute=="requestresponder"){
	$sql = "INSERT INTO posts(post_id,text,attribute,email,posted_at) VALUES(NULL,'$text','1','$email',curtime())";
	}
	require_once('aconf.php');
	$result=mysqli_query($conn,$sql);
	if(isset($result)){
	echo"Data Matched";}
	else{
	echo"failure";}
	}
?> 	