<?php
session_start();
if(isset($_SESSION['user'])){
        
}else{
header("location:login.php?error= No Access");
}
?>