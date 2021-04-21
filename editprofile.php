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
$user->errors=[];

if(($_SERVER["REQUEST_METHOD"]=="POST")&&(isset($_POST['update']))){
  if ($_POST['name']==='')
  {
  $user->errors[]= "Please Enter A Valid Name";
  }
  if($_POST['roll']==='')
  {
    $user->errors[] = "Please Enter A Valid Roll Number";
  }
  if($_POST['email']==='')
  {
   $user->errors[] = "Please Enter A Valid Email";
  }
  if($_POST['branch']=="")
  {
   $user->errors[] = "Please Enter A Valid Branch";
  }
  if($_POST['password']=="")
  {
   $user->errors[] = "Please Enter A Valid Password";
  }
  if(empty($user->errors))
  {
        echo count($user->errors);
    $user->name=$_POST['name'];
    $user->roll=$_POST['roll'];
    $user->email=$_POST['email'];
    $user->branch=$_POST['branch'];
    $user->pass=$_POST['password'];
    if($user->edit($conn,$_GET['id']))
    {
      Url::redirect("/homepage.php?id=".$_GET['id']."&& errors=".count($user->errors));
}    
else
echo "No";
}
}

require 'header.php';
?>

          <div class="container" style="width:50%;padding:5px;margin-top:50px; border-color:#e9e9e9!important;-webkit-box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);
        box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);">
        <h2 class="text-center fs-2 ">Edit Profile</h2>
        <ul>
        <?php foreach($user->errors as $error):?>
          <li><?= $error?></li>
          <?php endforeach;?>
          </ul>
        <form method="post">
            <div class="col-6 m-4">
                <label for="inputEmail4" class="form-label ml-2" style="font-size:16px;font-weight:500;">Email</label>
                <input  type="email" name="email" class="form-control" id="inputEmail4"  value="<?=htmlspecialchars($user->email)?>" >
            </div>
            <div class="col-6 m-4">
                <label for="inputPassword4" class="form-label ml-2" style="font-size:16px;font-weight:500;">Password</label>
                <input name="password" type="text" class="form-control" id="inputPassword4" value="<?=htmlspecialchars($_SESSION['password']) ?>" required="true">
            </div>
            <div class="col-6 m-4">
            <label for="inputname" class="form-label ml-2" style="font-size:16px;font-weight:500;">Name</label>
            <input name="name" type="text" class="form-control" id="inputname"  value="<?=htmlspecialchars($user->name) ?>">
            </div>
            <div class="col-6 m-4">
            <label for="inputroll" class="form-label ml-2" style="font-size:16px;font-weight:500;">Roll Number</label>
            <input name="roll" type="text" class="form-control" id="inputroll" value="<?=htmlspecialchars($user->roll) ?>">
            </div>
            <div class="col-6 m-4">
            <label for="inputname" class="form-label ml-2" style="font-size:16px;font-weight:500;">Branch</label>
            <input name="branch" type="text" class="form-control" id="inputAddress2" value="<?=htmlspecialchars($user->branch) ?>">
            </div>
            <div class="col-4 m-4">
            <input name="update" type="submit" class="btn btn-primary" value="Update"/>
        </form>
        </div>



        <script src="https://kit.fontawesome.com/14114923c9.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" 
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" 
  crossorigin="anonymous"></script>
</body>
</html>
  