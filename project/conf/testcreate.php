<?php
include("conf.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
	
  $name = htmlspecialchars($_POST["name"]);
  $lname = htmlspecialchars($_POST["lname"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);
  $attribute=htmlspecialchars($_POST["attribute"]);

	$CheckSQL = "SELECT * FROM users WHERE email='$email'";
 
	$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
	if(isset($check)){

	echo 'Email Already Exist';

	}
	else{
  	$query = "INSERT INTO users(id,name,lname,phone,email,password,attribute) VALUES (NULL,'$name','$lname','$phone','$email','$password','$attribute')";
  	$result=mysqli_query($con,$query);
	
	if($result){
		
		$_SESSION['email']=$email;
		header('location:../login.php');
		}else{
		header('location:../createaccount.php');
		
	}
}}
mysqli_close($con);
?>