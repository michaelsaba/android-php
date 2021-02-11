<?php 
include('aconfig.php');
$stmt=$con->prepare("SELECT email,text,posted_at FROM posts");
$stmt->execute();
$stmt->bind_result($email,$text,$posted_at);
$feed=array();
while($stmt->fetch()){
$post=array();
$temp['email']=$email;
$temp['text']=$text;
$temp['posted_at']=$posted_at;
array_push($post,$feed);
}
json_encode($feed);?>