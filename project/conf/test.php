<?php
require('functions.php');
$response = array("error" => FALSE);
if(isset($_POST['submit'])){

    $email = htmlspecialchars($_POST["email"]);
    $password =htmlspecialchars($_POST["password"]);

	$user = getUserByEmailAndPassword($email, $password);
      if($user!=false){
		$response["error"] = FALSE;
		$response["user"]["id"] = $user["id"];
        $response["user"]["email"] = $user["email"];
		json_encode($response);
		$_SESSION['id']=$id;
		$_SESSION['email'] = $email;
		$_SESSION['name']=$name;
		$_SESSION['lname']=$lname;
		$_SESSION['phone']=$phone;
        header('Location: ../homelogin.php?email='.$_SESSION['email'].'');
        }
				
		else{
		$response["error"] = TRUE;
        $response["error_msg"] = "Wrong email or password entered! Please try again!";
        echo json_encode($response);			
            echo "Invalid email and password";
        }

    
}?>