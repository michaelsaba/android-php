<?php
require("conf/session.php");
require("conf/conn.php");
?>

<!DOCTYPE html>
<html>
	<head>
<title>HELPATH</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
	</style>
	<script src="jquery.js"></script>
</head
<body class="w3-theme-l5">
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="homelogin.php"><i class="fa fa-bars"></i></a>
  <a href="homelogin.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>HELPATH</a>
  <a href="conf/logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">LOGOUT</a>
 </div>
</div><!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">   
    <!-- Middle Column -->
    <div class="w3-col m7;max width:1200px">
		<div style="padding:20px;width:50%;border:5px">
		<form method="POST" action="">
		<input   type="search" id="search"name="search" placeholder="Search...">
		<button  name="submit" value="submit" id="search_btn"class="w3-button w3-theme"><i class="fa fa-search"></i></button></form>
		</div>
			
	    <div style="width:20%;padding:3px;margin:0 auto">
		<a id="home1" href="homelogin.php"class="w3-button w3-tiny w3-theme">page 1</a>
		<a id="home2"href="homelogin1.php"class="w3-button w3-tiny w3-theme">page 2</a>
		</div>
	  		
		<?php    
		global $con;
		$text = htmlspecialchars($_POST['search']);
		$sql=mysqli_query($con,"SELECT * FROM `posts` WHERE text LIKE '%".$text."%'"); 
		while ($row = mysqli_fetch_assoc($sql)){
			$text=($row['text']);
			$date=($row['posted_at']);
			$email=($row['email']);		
		echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
        <span class='w3-right w3-opacity'>".$date."</span>
        <h4><a href='mailto:".$email."'>".$email."</a></h4>
        <hr class='w3-clear'>
        <p>".$text."</p>
		</div>";
		}
		
		?>
	  
      
    <!-- End Middle Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>


<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>LU PROJECT</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p style="text-align:center">©HELLPATH 2020</a></p>
</footer>

</body>
</html> 
