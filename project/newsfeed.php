<?php  include('conf/conf.php');
	global $con;
	$emparray=array();
		$sql=mysqli_query($con,"SELECT * FROM `posts` ORDER BY 'posted_at' ");
				$emparray['success']=1;
				$post = array();
			while($row=mysqli_fetch_assoc($sql)){
			$text=($row['text']);
			$date=($row['posted_at']);
			$email=($row['email']);
			array_push($post,$text,$date,$email);
		
		echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <span class='w3-right w3-opacity'>".$date."</span>
        <h4><a href='mailto:".$email."'>".$email."</a></h4>
        <hr class='w3-clear'>
        <p>".$text."</p>
      </div>";
		 
		header('../homelogin.php');
		
		}
		$emparray['post']=$post;
		
	   json_encode($emparray);
?>
