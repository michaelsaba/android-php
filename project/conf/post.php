<?php
include('conf.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
		$text=htmlspecialchars($_POST["text"]);
		$mail=$_SESSION['email'];
		$sql="INSERT INTO posts(post_id,text,email,posted_at) VALUES (NULL,'$text','$mail',)";
			$result = mysqli_query($con,$sql);
			if($result){
			echo"post in databse";}
			
		
		

}
	
?>	