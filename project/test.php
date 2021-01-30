<?php 
session_start();

if(isset($_POST["email"]) && isset($_POST["pass"]) ){
$name=htmlspecialchars($_POST["email"]);
$pass=htmlspecialchars($_POST["pass"]);
$_con=conn();
$_sql="SELECT count(*) as nbr FROM `user` WHERE `email='".$email."' and `pass`='".$pass."'";
$result=mysqli_query($con,$root);
$v=mysqli_fetch_assoc($result);
	if($v["nbr"])
	{	 $_SESSION["test"]=true;
		 $_SESSION["email"]=$email;
		 header("location:homelogin.php");
		 if($_POST["TYPE"]=="pc")
			 header("location:pageforpc.php");
		 else
			 header("location:pageforandroid.php");//echo json code
	 }else header("location:login.php?error=missing information");
}else header ("location:login.php");
?>
	 
		