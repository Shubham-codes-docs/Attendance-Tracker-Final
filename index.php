<!DOCTYPE html>
<html>
<head>
	<title>USER LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>USER LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="email" name="uname" placeholder="email"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>

          <a href="aindex.php" class = "ca">Admin Login</a>
          <a href="signup.php" class="ca">Create an account</a>


     </form>
</body>
</html>