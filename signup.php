<?php 
require "functions/load.php";
$conn= require "functions/db.php";
$errors=[];
$user = new SignIn();
  $user->name = '';
  $user->roll = '';
  $user->email = '';
  $user->branch = '';
  $user->password = '';
  $user->cpassword = '';
if($_SERVER['REQUEST_METHOD']==="POST")
{
  $user->name = $_POST['name'];
  $user->roll = $_POST['roll'];
  $user->email = $_POST['email'];
  $user->branch = $_POST['branch'];
  $user->password = $_POST['password'];
  $user->cpassword = $_POST['cpassword'];
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
  if($user->password!=$user->cpassword)
  {
   $errors[] = "Passwords Do Not Match";
  }
  if(count($errors)===0)
  {
    if(!SignIn::isExisting($conn,$user->email))
    {
     if( $user->AddUser($conn,$user->name,$user->roll,$user->email,$user->branch,$user->password))
     {
      Url::redirect("/login.php");
    }
  }
  else{
    $errors[]= "Email Id Taken";
  }
  }
}
?>


<?php require 'header.php'?>
    <div
      class="container-md border border-primary border-2 mt-5"
      id="outer-wrap"
    >
      <div class="display">
        <h2 class="text-center text-primary pt-2 fs-1">Signup</h2>
        <?php foreach($errors as $error):?>
          <ul>
          <li><?= $error?></li>
          <?php endforeach;?>
          </ul>
        <div class="size">
          <form method="post">
            <div class="mb-3">
              <label for="name" class="form-label text-primary">Name</label>
              <input
                class="form-control"
                type="text"
                name="name"
                id="name"
                placeholder="Enter Your Name "
                value=" <?= htmlspecialchars($user->name)?>"
              />
            </div>
            <div class="mb-3">
              <label for="roll" class="form-label text-primary"
                >Roll Number</label
              >
              <input
                class="form-control mb-2"
                type="text"
                name="roll"
                id="roll"
                placeholder="Enter Your Roll Number"
                value= "<?= htmlspecialchars($user->roll)?>"
              />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label text-primary">Email</label>
              <input
                class="form-control"
                type="email"
                name="email"
                id="email"
                placeholder="Enter Your College Email"
                value=" <?= htmlspecialchars($user->email)?>"
              />
            </div>
            <div class="mb-3">
              <label for="branch" class="form-label text-primary"
                >Enter Your Branch</label
              >
              <select name="branch" id="branch" class="form-select">
                <option value="Cs">Computer Sceince</option>
                <option value="ECE">Electrical</option>
                <option value="Mech">Mechanical</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label text-primary"
                >Password</label
              >
              <input
                class="form-control"
                type="password"
                name="password"
                id="password"
                placeholder="Enter Your Password"
                value=" <?= htmlspecialchars($user->password)?>"
              />
            </div>
            <div class="mb-3">
              <label for="cpassword" class="form-label text-primary"
                >Confirm Password</label
              >
              <input
                type="password"
                name="cpassword"
                id="cpassword"
                class="form-control"
                placeholder="Confirm Password"
                value= "<?= htmlspecialchars($user->cpassword)?>"
              />
            </div>
            <button class="btn btn-primary mb-3">Signup</button>
          </form>
        </div>
        <p>
          Already have an account
          <a href="login.php" class="btn btn-primary mb-3">Log In</a>
        </p>
      </div>
    </div>
  </body>
</html>
