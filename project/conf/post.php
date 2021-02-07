<?php	require('functions.php');
	global $con;
	
	$text=$_POST['text'];
	$email=$_SESSION['email'];
	$emparray=array();	
	$post=storePost($text,$email);
	if($post!=false){
		$emparray["success"]=true;
	header('location:../homelogin.php');
	}
	else{
		$emparray["success"]=false;
		echo"failed";
	} 
	json_encode($emparray);
	

?>	