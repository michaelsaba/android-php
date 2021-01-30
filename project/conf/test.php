<?php
require ("conf.php");

if(isset($_POST['submit'])){

    $email = htmlspecialchars($_POST["email"]);
    $password =htmlspecialchars($_POST["password"]);

    if ($email != "" && $password != ""){

        $sql_query = "select id from users where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
        $count = mysqli_num_rows($result);
		
        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location: ../homelogin.php');
        }else{
            echo "Invalid email and password";
        }

    }

}?>