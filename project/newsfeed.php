<?php  include('conf/conf.php');
	global $con;
	$emparray=array();
		$sql=mysqli_query($con,"SELECT * FROM `posts` ORDER BY 'curtime()' ");
			while($fetch=mysqli_fetch_assoc($sql)){
			$text=($fetch['text']);
			$date=($fetch['posted_at']);
			$email=($fetch['email']);
			$emparray[]=$fetch;
			json_encode($emparray);
		
		echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <span class='w3-right w3-opacity'>".$date."</span>
        <h4>".$email."</h4>
        <hr class='w3-clear'>
        <p>".$text."</p>
      </div>";
		 
		header('../homelogin.php');
		
		
	  } 
	  ;
?>
