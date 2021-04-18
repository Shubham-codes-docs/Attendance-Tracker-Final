<?php

require "../functions/load.php";

$conn= require "../functions/db.php";
session_start();
 $errors=[];
  if(isset($_POST['login'])){
    if($_POST['username']!="" && $_POST['password']!=""){
     $id = CheckUser::adminCheck($conn,$_POST['username'],$_POST['password']);
      if($id)
      {
          AdAuth::logIn();
          $_SESSION['adminid']=$id;
          Url::redirect("/admin/admin.php");
      }
      else
      {
          $_SESSION['is_adminlogged_in']=false;
          $errors[]="Invalid Credentials";
      }
    }
  }
?>
<?php require '../header.php';?>
<h2>Log In</h2>
<?php foreach($errors as $error):?>
 <p><?php echo $error;?></p>
 <?php endforeach?>
<form method="post">
<div class="form-group">
<label for="username">UserName</label>
<input type="text" name="username" id="username" placeholder="Enter The Username" class="form-control">
</div>

<div  class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
</div>
<div >
<button name ="login" class="btn  btn-primary mt-1 " >Log In</button>
</div>

</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>