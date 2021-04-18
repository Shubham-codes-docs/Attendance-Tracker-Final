  <?php 

require "functions/load.php";
$conn = require "./functions/db.php";
session_start();
Auth::requireLogIn();
if($_GET['id']!==$_SESSION['userid'])
{
  die("Unauthorized");
}

$user = User::getById($conn,$_GET['id']);
$errors=[];
if(isset($_GET['id']))
{
  if ($user->name==='')
  {
  $errors[]= "Please Enter A Valid Name";
  }
  if($user->roll==='')
  {
   $errors[] = "Please Enter A Valid Roll Number";
  }
  if($user->email==='')
  {
   $errors[] = "Please Enter A Valid Email";
  }
  if($user->branch==='')
  {
   $errors[] = "Please Enter A Valid Branch";
  }
  if($user->password==='')
  {
   $errors[] = "Please Enter A Valid Password";
  }
  if(count($errors)===0)
  {
    

if($_SERVER["REQUEST_METHOD"]=="POST"){
        
    $user->name=$_POST['name'];
    $user->roll=$_POST['roll'];
    $user->email=$_POST['email'];
    $user->branch=$_POST['branch'];
    $user->pass=$_POST['password'];
    if($user->edit($conn,$_GET['id']))
    {
      Url::redirect("/homepage.php?id=".$_GET['id']);
}    
else
echo "No";
}
}
}

require 'header.php';
?>
<h2>Edit Profile</h2>
        <ul>
        <?php foreach($errors as $error):?>
          <li><?= $error?></li>
          <?php endforeach;?>
          </ul>

<form  method="POST">
  <div class="form-row">
    <div class="form-group col-md-6 ">
      <label for="inputEmail4">Email</label>
      <input  type="email" name="email" class="form-control" id="inputEmail4"  value="<?=htmlspecialchars($user->email) ?>">
    </div>
    <div class="form-group col-md-6 ">
      <label for="inputPassword4">Password</label>
      <input name="password" type="password" class="form-control" id="inputPassword4" value="<?=htmlspecialchars($user->pass) ?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Name</label>
    <input name="name" type="text" class="form-control" id="inputAddress"  value="<?=htmlspecialchars($user->name) ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Roll</label>
    <input name="roll" type="text" class="form-control" id="inputAddress2" value="<?=htmlspecialchars($user->roll) ?>" >
  </div>
  <div class="form-group">
    <label for="inputAddress2">Branch</label>
    <input name="branch" type="text" class="form-control" id="inputAddress2" value="<?=htmlspecialchars($user->branch) ?>"  >
  </div>



  <input name="update" type="submit" class="btn btn-primary" value="Update"/>
</form>






  
  <?php   ?>

</body>
</html>














  <script src="https://kit.fontawesome.com/14114923c9.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" 
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" 
  crossorigin="anonymous"></script>




 <?php 


if(isset($_POST['update'])){
$new_name = $_POST['name'];
$new_branch = $_POST['branch'];
$new_roll = $_POST['roll'];
$new_password = $_POST['password'];

$sql ="  UPDATE `registration` SET `Name`='$new_name',`Roll`='$new_roll',`Branch`='$new_branch',`Pass`='$new_password' WHERE email='$usermail' ";
$res=mysqli_query($con,$sql);
if($res){
  ?>
<script>
alert("updated");
</script>
<?php

}
else{

?>
<script>
alert("not updated");
</script>
<?php
}
header("Refresh:0");

}




 ?> 











