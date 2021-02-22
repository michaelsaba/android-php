<?php

require_once('aconf.php');
$text = htmlspecialchars($_GET['text']);
$sql = "SELECT text,email,posted_at FROM posts where text LIKE '%$text%' ORDER BY posted_at DESC  ";
if($result = mysqli_query($conn,$sql)){
    $emparray = array();
	while($row =mysqli_fetch_assoc($result))
    $emparray[] = $row;
       
 echo(json_encode($emparray));

}
?>