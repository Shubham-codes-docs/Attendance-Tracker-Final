  
<?php 
include './functions/connect.php';
$usermail = 'shashankkaran999@gmail.com';


$selectquery = "SELECT * FROM registration WHERE email= '$usermail'";
$result = mysqli_query($con,$selectquery);
while($res = mysqli_fetch_array($result)){

require 'header.php';

?>


<form action="editProfile.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6 ">
      <label for="inputEmail4">Email</label>
      <input name="email" type="email" class="form-control" id="inputEmail4"  value="<?php echo $usermail ?> "disabled>
    </div>
    <div class="form-group col-md-6 ">
      <label for="inputPassword4">Password</label>
      <input name="password" type="password" class="form-control" id="inputPassword4" value="<?php echo $res['Pass'] ?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Name</label>
    <input name="name" type="text" class="form-control" id="inputAddress"  value="<?php echo $res['Name'] ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Roll</label>
    <input name="roll" type="text" class="form-control" id="inputAddress2" value="<?php echo $res['Roll'] ?>"  >
  </div>
  <div class="form-group">
    <label for="inputAddress2">Branch</label>
    <input name="branch" type="text" class="form-control" id="inputAddress2" value="<?php echo $res['Branch'] ?>"  >
  </div>



  <input name="update" type="submit" class="btn btn-primary" value="Update"/>
</form>






  
  <?php }  ?>

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











