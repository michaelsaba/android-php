<?php	include('functions.php');
	include('session.php');
	global $con;

	$text=$_POST['text'];
	$emparray=array();	
	$post=storePost($text,$_SESSION['attribute'],$_SESSION['email']);
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