<<<<<<< HEAD
<?php

require "functions/load.php";

$conn= require "functions/db.php";
session_start();
 $errors=[];
 if($_SERVER['REQUEST_METHOD']==="POST")
  {
    $id = CheckUser::authenticate($conn,$_POST['username'],$_POST['password']);
    if($id)
    {
        Auth::logIn();
        $_SESSION['userid']=$id;
        Url::redirect("/homepage.php?id=".$id);
    }
    else
    {
        $_SESSION['is_logged_in']=false;
        $errors[]="Invalid Credentials";
    }
  } 
?>
<?php require 'header.php';?>
<h2>Log In</h2>
<?php foreach($errors as $error):?>
 <p><?php echo $error;?></p>
 <?php endforeach?>
<form  method="post">
<div class="form-group">
<label for="username">UserName</label>
<input type="text" name="username" id="username" placeholder="Enter The Username" class="form-control">
</div>

<div  class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
</div>
<div >
<button class="btn  btn-primary mt-1 " >Log In</button>
</div>

</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
=======
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
>>>>>>> b175525ba9ee624accca3ad877b407c077aa05fc
