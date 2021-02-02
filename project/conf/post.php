<?php
require('conf.php');
	global $con;
	$text=$_POST['t'];	
	if(!$text){
	echo" <p>ERROR</p>";}
	else{
	
	mysqli_query($con,"INSERT INTO posts(post_id,text,email,posted_at) VALUES(NULL,'$text','anthinysaade@gmail.com',GETDATE())";
	}
	?>
	<script src="jquery.js"></script>
	<script>
	$(document).ready(function(){
		$("#status_box").val("");
	});
	</script>
		
	
	
	

