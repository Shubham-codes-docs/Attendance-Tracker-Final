<?php
require "functions/load.php";
$conn = require "functions/db.php";
$errors = [];
$user = new SignIn();
$user->name = '';
$user->roll = '';
$user->email = '';
$user->branch = '';
$user->password = '';
$user->cpassword = '';
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $user->name = $_POST['name'];
    $user->roll = $_POST['roll'];
    $user->email = $_POST['email'];
    $user->branch = $_POST['branch'];
    $user->password = $_POST['password'];
    $user->cpassword = $_POST['cpassword'];
    if ($user->name === '')
    {
        $errors[] = "Please Enter A Valid Name";
    }
    if ($user->roll === '')
    {
        $errors[] = "Please Enter A Valid Roll Number";
    }
    if ($user->email === '')
    {
        $errors[] = "Please Enter A Valid Email";
    }
    if ($user->branch === '')
    {
        $errors[] = "Please Enter A Valid Branch";
    }
    if ($user->password === '')
    {
        $errors[] = "Please Enter A Valid Password";
    }
    if ($user->password != $user->cpassword)
    {
        $errors[] = "Passwords Do Not Match";
    }
    if (count($errors) === 0)
    {
        if (!SignIn::isExisting($conn, $user->email))
        {
            $id = $user->AddUser($conn, $user->name, $user->roll, $user->email, $user->branch, $user->password);
            if ($id)
            {
                $user->manageMeets($conn, $id);
                Url::redirect("/login.php");
            }
        }
        else
        {
            $errors[] = "Email Id Taken";
        }
    }
}
?>


<?php require 'header.php' ?>
    
  <div class='session'>
  <div class="left">

    <svg enable-background="new 0 0 300 302.5" version="1.1" viewBox="0 0 300 302.5" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <style type="text/css">
        .st01 {
          fill: #fff;
        }
      </style>
      <path class="st01" d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4zm63.4-102.7c2.3-0.7 4.8-3.1 5.7-5.3l19.9-50.8c0.9-2.2 0.6-5.7-0.6-7.7l-27.3-47.3c-1.2-2-4.1-4-6.4-4.4l-53.9-8c-2.3-0.4-5.7 0.7-7.4 2.3l-40 37.1c-1.7 1.6-3 4.9-2.8 7.2l4.1 54.4c0.2 2.4 1.9 5.4 3.9 6.7l45.1 30.8c2 1.3 5.4 1.9 7.7 1.2l52-16.2z" />
    </svg>
  </div>

        
       
          <form method="post" action="" class="log-in" autocomplete="off">
          <h4><span>Attendence Tracker</span></h4>
          <p>Welcome! <br><br>Create an account to mark your attendence</p>
          <p>
          <ul>
        <?php foreach ($errors as $error): ?>
          <li><?=$error
?></li>
          <?php
endforeach; ?>
          </ul> 
          <p>
            <div class="floating-label"><span class="mb-3-addon"><i class="fa fa-user"></i></span>
              <label for="name">Name</label>
              <input
               
                type="text"
                placeholder="Enter Your Name"
                name="name"
                id="name"
                value="<?=htmlspecialchars($user->name) ?>" 
               required/> 
               
            </div>
            <div class="floating-label">
              <label for="roll" 
                >Roll Number</label
              >
              <input
                
                type="text"
                name="roll"
                id="roll"
                placeholder="Enter Your Roll Number"
                  value= "<?=htmlspecialchars($user->roll) ?>" 
               /> 
            </div>
            <div class="floating-label"><span class="mb-3-addon"><i class="fa fa-paper-plane"></i></span>
              <label for="email">Email</label>
              <input
               
                type="email"
                name="email"
                id="email"
                placeholder="Enter Your College Email"
                  value=" <?=htmlspecialchars($user->email) ?>" 
               required/> 
            </div>
            <div class="floating-label">
              <label for="branch" 
                >Choose Your Branch</label
              >
              <select name="branch" id="branch"  required>
                <option value="CSE">Computer Sceince</option>
                <option value="ECE">Electrical and Communication</option>
                <option value="ME">Mechanical </option>
                <option value="PI">Production </option>
                <option value="CE">Civil </option>
                <option value="EE">Electrical </option>
              </select>
            </div>
            <div class="floating-label"> <span class="mb-3-addon"><i class="fa fa-lock"></i></span>
              <label for="password" 
                >Password</label
              >
              <input
                
                type="password"
                name="password"
                id="password"
                placeholder="Enter Your Password"
                 value="<?=htmlspecialchars($user->password) ?>" 
              required /> 
            </div>
            <div class="floating-label"><span class="mb-3-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
              <label for="cpassword"
                >Confirm Password</label
              >
              <input
                type="password"
                name="cpassword"
                id="cpassword"
               
                placeholder="Confirm Password"
                 value= "<?=htmlspecialchars($user->cpassword) ?>" 
              required/> 
            </div>
            <button type='submit'>Signup</button>
            <div id="links">
            <p id="links">Have An <a href="login.php">Log In</a></p>
            <p id="links"><a href="./admin/login1.php">Admin login</a></p>
          </form>
    </div>
    <script>

var fileref = document.createElement("link");
fileref.rel = "stylesheet";
fileref.type = "text/css";
fileref.href = "./assets/css/signupstyle.css";
document.getElementsByTagName("head")[0].appendChild(fileref)

</script>
  </body>
</html>
