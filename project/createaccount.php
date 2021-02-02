<? include('conf/conf.php');?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/stylecreate.css">
</head>
<body>
<div >
   <form class="modal-content" action="conf/testcreate.php" method="post">
    <div class="container">
      <h1 style="tex-align:center">create account</h1>
      <hr>
		
	  <label for="name"><b>First Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>
       
	  <label for="lname"><b>Lname</b></label>
      <input type="text" placeholder="Last Name"  name="lname" required>
	  
	  <label for="phone"><b>Phone Number</b></label>
      <input type="number_format" placeholder="phone" name="phone" required></br></br></br></br>
	  
	  <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
		
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>   
	  
	  <label for="HR"><b>HelpSeeker</b></label>
      <input type="checkbox" value="0"  name="attribute" > 
	  
	  <label for="RR"><b>RR</b></label>
      <input type="checkbox"  value="1" name="attribute" > 
	  
	  
      <p>By creating an account you agree to our Terms & Privacy</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn"><a href="login.php">Already a user Login</a></button>
        <button type="submit" class="signupbtn" value="submit"	id="submit">submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>