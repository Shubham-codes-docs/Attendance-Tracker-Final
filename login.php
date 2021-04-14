<?php 
session_start(); 
include "connect_signup.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
		$sql = "SELECT * FROM users WHERE user_name='$email' AND password='$password'";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: dummyhome.php");   //shubham's homepage
		        exit();
            }else{
				header("Location: index.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorrect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}