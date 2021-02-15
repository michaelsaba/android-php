<?php
include("conn.php");
if(isset($_POST['home1'])){

    $email = htmlspecialchars($_POST["email"]);
    $password =htmlspecialchars($_POST["password"]);
        
$query = " SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."' ";
$run_query = mysqli_query($con, $query);
            
if(mysqli_num_rows($run_query) == 1){
session_start();
while($result = mysqli_fetch_assoc($run_query)){
$user_id = $result['id'];
$user_email = $result['email'];
$user_attribute=$result['attribute'];
$_SESSION['user'] = $user_id;
$_SESSION['email']=$user_email;
$_SESSION['attribute']=$user_attribute;
                    
header("Location:../homelogin.php");
}
}else{
header("Location:../login.php?error= invalide credentials");
}
}

?>