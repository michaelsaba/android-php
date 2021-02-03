<?php require("conf.php");?>
<?php

	function storeUser($name, $lname,$phone,$email,$password,$attribute){
		global $con;
		$query = "INSERT INTO users(id,name,lname,phone,email,password,attribute) VALUES (NULL,'$name','$lname','$phone','$email','$password','$attribute')";
		
		$result = mysqli_query($con, $query);

		if($result){
			$user = "SELECT * FROM users WHERE email = '$email'";
			$res = mysqli_query($con, $user);

			while ($user = mysqli_fetch_assoc($res)){
				return $user;
			}
		}else{
				return false;
			}

	}

	function storePost($text,$email){
		global $con;
		$sql="INSERT INTO posts(post_id,text,email,posted_at) VALUES(NULL,'$text','$email',curtime())";
		$result=mysqli_query($con,$sql);
		if($result){
			$post = "SELECT * FROM posts";
			$res = mysqli_query($con, $post);

			while ($post = mysqli_fetch_assoc($res)){
				return $post;
			}
		}else{
				return false;
			}

	
	
}
	
	function getUserByEmailAndPassword($email, $password){
		global $con;
		$query = "SELECT * from users where email = '$email' and password = '$password'";
		$sql="SELECT * from users";
		$user = mysqli_query($con, $query);
		
		if($user){
			while ($res = mysqli_fetch_assoc($user)){
				return $res;
			}
		}
		else{
			return false;
		}
	}


	function emailExists($email){
		global $con;
		$query = "SELECT email from users where email = '$email'";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0){
			return true;
		}else{
			return false;
		}
	}

?>