<?php include('conf/conf.php');
?>
<!DOCTYPE html>
<html style="background-color:white;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylelogin.css">
</head>
<body>
<div > 
  <form class="modal-content animate" action="conf/test.php" method="post">
    <div class="imgcontainer">
      <span class="close" title="Close Modal"><a href="home.php">&times;</a></span>
      <img src="logo.jpg"	alt="logo" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="submit" value="submit" id="submit">Login</button>
       </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn"><a href="home.php"> Cancel</a></button>
      <span class="psw"><a href="createaccount.php">create an account</a></span>
    </div>
  </form>
</div>

</body>
</html>
