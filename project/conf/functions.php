<?php require("conf.php");?>
<?php
	
	function storeUser($name, $lname,$phone,$email,$password,$attribute){
		global $con;
		$query = "INSERT INTO users(id,name,lname,phone,email,password,attribute) VALUES (NULL,'$name','$lname','$phone','$email','$password','$attribute')";
		$result = mysqli_query($con, $query);
		$emparray=array();
		if($result){
			$emparray["success"]=true;
			$user = "SELECT * FROM users WHERE email = '$email'";
			$res = mysqli_query($con, $user);
			
			while ($user = mysqli_fetch_assoc($res)){
				$emparray[]=$user;
				return $user;
			}
		}else{
			$emparray["success"]=false;
				return false;
			}
		json_encode($emparray);
	}

	function storePost($text,$email){
		global $con;
		$emparray=array();
		$sql="INSERT INTO posts(post_id,text,email,posted_at) VALUES(NULL,'$text','$email',curtime())";
		$result=mysqli_query($con,$sql);
		if($result){
			$emparray["success"]=true;
			$post = "SELECT * FROM posts";
			$res = mysqli_query($con, $post);
				
			while ($post = mysqli_fetch_assoc($res)){
				$emparray[]=$post;
				return $post;
			}
		}else{
				$emparray["success"]=false;
				return false;
			}

	json_encode($emparray);
	
	}
	
	function getUserByEmailAndPassword($email, $password){
		global $con;
		$emparray=array();
		$query = "SELECT * from users where email = '$email' and password = '$password'";
		$sql="SELECT * from users";
		$user = mysqli_query($con, $query);
		
		if($user){
			while ($res = mysqli_fetch_assoc($user)){
				$emparray[]=$res;
				return $res;
			}
		}
		else{
			$emparray["success"]=false;
			return false;
		}
		json_encode($emparray);
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