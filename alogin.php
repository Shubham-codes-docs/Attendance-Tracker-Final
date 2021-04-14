<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: aindex.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: aindex.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

		$sql = "SELECT * FROM users WHERE email='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $uname && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: adummyhome.php");   //suvrodeep's page
		        exit();
            }else{
				header("Location: aindex.php?error=Incorrect Email or password");
		        exit();
			}
		}else{
			header("Location: aindex.php?error=Incorrect Email or password");
	        exit();
		}
	}
	
}else{
	header("Location: aindex.php");
	exit();
}