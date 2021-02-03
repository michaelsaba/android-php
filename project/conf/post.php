<?php	require('functions.php');
			global $con;
	
	$text=$_POST['text'];
	$email=$_SESSION['email'];
		
	$post=storePost($text,$email);
	if($post!=false){
	header('location:../homelogin.php');
	}
	else{
		echo"failed";
	}

?>		
	
	
	

