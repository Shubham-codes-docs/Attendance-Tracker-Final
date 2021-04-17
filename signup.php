<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: skyblue;
            font-family: 'Roboto', sans-serif;
            font-weight: 4px bold;
        }
        

        .display {
            width: 390px;
            margin: 5px auto;
            padding: 30px 0;
        }

        .mb-3-addon {
            border-color: #e1e1e1;
        }

        #outer-wrap.fa {
            font-size: 21px;
        }

        #outer-wrap.fa-paper-plane {
            font-size: 18px;
        }

        #outer-wrap.fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }

        #outer-wrap form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        #outer-wrap h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }

        #outer-wrap hr {
            margin: 0 -30px 20px;
        }

        .mb-3 .form-control {
            min-height: 34px;
            box-shadow: none !important;
        }

        select#branch.form-select {
            height: 34px;
            width: 330px;
            border-color: #e1e1e1;
            border-radius: 3px;

        }
       
    </style>
</head>

<body>
    <div>
        <?php

        include_once('connect_signup.php');

        if (isset($_POST['submit'])) {
            $name  =   mysqli_real_escape_string($con, $_POST['name']);
            $roll  =  mysqli_real_escape_string($con, $_POST['roll']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $branch =  mysqli_real_escape_string($con, $_POST['branch']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            // $pass = password_hash($password, PASSWORD_BCRYPT);
            // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
             $emailquery = " select * from users where email='$email'";
            $query = mysqli_query($con, $emailquery);
             $emailcount = mysqli_num_rows($query);
            //  if ($emailcount>0) {
            //    ?>
            <!-- //     <script>alert("email already exists!");  -->
         </script>
           <?php
                
            //  } 

            
                 if (($password === $cpassword)&&($emailcount==0)){
              $sql = "INSERT INTO users( name,roll,email,branch,password) VALUES('$name','$roll','$email','$branch','$password')";
           
             $iquery = mysqli_query($con, $sql);
                    if ($iquery) {
                         ?>
         
                         <script>
                             alert("Submitted successfully!");
                         </script>
                     <?php
                     }
                     
                    
                     else{
                            ?>
                            <script>
                      
                          alert("not submitted"); 
                      </script> 
                          <?php 
                     }
                    
                    
                    }
                    elseif($emailcount>0) {
                        ?>
                         <script>alert("email already exists!"); 
                     </script>
                        <?php
                         
                      } 
                  else {
                     ?>
                     <script>
                         alert("Password not matching");
                     </script>
                      <?php
                  }
                }
            
            
        ?>
    </div>

    <div class="container-md border border-primary border-2 mt-5" id="outer-wrap">
        <div class="display">

            <div class="size">
                <form method="POST">
                    <h2 class="text-center text-primary pt-2 fs-1">Signup</h2>
                    <p>Please fill in this form to create an account!</p>
                    <hr>
                    <div class="mb-3"><span class="mb-3-addon"><i class="fa fa-user"></i></span>
                        <label for="name" class="form-label text-primary">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name " required/>
                    </div>
                    <div class="mb-3">
                        <label for="roll" class="form-label text-primary">Roll Number</label>
                        <input class="form-control mb-2" type="text" name="roll" id="roll" placeholder="Enter your roll no. eg.2020UGCEXXX "required />
                    </div>
                    <div class="mb-3">
                        <span class="mb-3-addon"><i class="fa fa-paper-plane"></i></span>
                        <label for="email" class="form-label text-primary">Email ID</label>

                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your college email Id" required/>
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="form-label text-primary">Chose your branch</label>


                        <select name="branch" id="branch" class="form-select" required>

                            <option value="Cs">Computer Sceince</option>
                            <option value="ECE">Electronics and communication</option>
                            <option value="ME">Mechanical</option>
                            <option value="EE">Electrical and Electronics</option>
                            <option value="MME">Metallurgical and Materials</option>
                            <option value="CE">Civil</option>
                            <option value="PI">Production</option>


                        </select>


                    </div>
                    <div class="mb-3">
                        <span class="mb-3-addon"><i class="fa fa-lock"></i></span>
                        <label for="password" class="form-label text-primary">Create new password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter new password" required/>
                    </div>
                    <div class="mb-3">
                        <span class="mb-3-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                        <label for="cpassword" class="form-label text-primary">Confirm new password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Re-enter new password" required/>

                    </div>
                    <br>
                    <button class="btn btn-primary mb-3" name="submit" type="submit">Signup</button>
                </form>
            </div>
            <p>
                Already have an account?

                 
                 <a href="index.php" class="btn btn-primary mb-3">Log In</a>
               

            </p>
        
        </div>
        </div>
 
</body>

</html>
>>>>>>> b175525ba9ee624accca3ad877b407c077aa05fc
