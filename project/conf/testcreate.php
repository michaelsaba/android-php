<?php
require('functions.php');
$response =array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	
  $name = htmlspecialchars($_POST["name"]);
  $lname = htmlspecialchars($_POST["lname"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);
  $attribute=htmlspecialchars($_POST["attribute"]);

	if(emailExists($email)){
        $response["error"] = TRUE;
        $response["error_msg"] = "Email already exists with ".$email;
        json_encode($response);
		header('location:../login.php');
	}else {

        $user = storeUser($name,$lname,$phone,$email,$password,$attribute);
        if ($user) {
            $response["error"] = FALSE;
            $response["user"]["phone"] = $user["phone"];
			$response["user"]["name"] = $user["name"];
			$response["user"]["lname"] = $user["lname"];
			$response["user"]["email"] = $user["email"];
            $response["user"]["password"] = $user["password"];
            $response["user"]["attribute"] = $user["attribute"];
			json_encode($response);
			$_SESSION['email']=$email;
			header('location:../homelogin.php');
		} else {
				$response["error"] = TRUE;
				$response["error_msg"] = "Unknown error occurred!";
				json_encode($response);
				header('location:../createaccount.php?');
			}
    }

}
	mysqli_close($con);
?>