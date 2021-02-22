<?php

require_once('aconf.php');
$sql = "SELECT email,text,posted_at FROM posts ORDER BY posted_at DESC ";
if ($result = mysqli_query($conn,$sql))
  {
   $emparray = array();
   while($row=mysqli_fetch_assoc($result))
       $emparray[] = $row;

  echo(json_encode($emparray));

  mysqli_close($conn);
}

?> 