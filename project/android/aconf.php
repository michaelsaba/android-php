<?php

$servername = "192.168.0.103";
$username = "helpath";
$password = "Helpath@123";
$dbname = "helpath";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    	die("OOPs something went wrong");
    }

?>