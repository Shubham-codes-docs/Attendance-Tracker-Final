<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="shortcut icon" href="assets/fav.ico">
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   
    <script src="https://kit.fontawesome.com/8367094e74.js" crossorigin="anonymous"></script>
    <title>Homepage</title>
    <style>
        html{
            padding:0;
            margin:0px auto;
             width:80%;
             height:80%;
             background-color:#020815 !important;
             box-sizing: border-box;

        }
        body{
            background-color:black !important;
            padding:0;
            margin: 700px auto ;
            
            height:80%vh;
            width:80%;
            box-sizing: border-box;
            

        }
    .display {
            width: 390px;
            margin: 5px auto 5px auto;
            padding: 30px 30px;
            color: black;
            background-color:lightyellow ;
            box-sizing: border-box;
            border-radius: 20px;
            position:absolute;
            top:50%;
            left:50%;
             transform:translateX(-50%)translateY(-50%);


        }
        strong{
            color:black;
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

        
               #outer-wrap form {
            color: black;
            border-radius: 3px;
            margin-bottom: 15px;
            background:darkorange;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        

        .mb-3 .form-control {
            min-height: 34px;
            box-shadow: none !important;
        }

        select#branch.form-select {
            height: 34px;
            width: 270px;
             border-color: grey; 
            border-radius: 3px;


        }
        
        input{
            display: block;
            width:320px;
            height:30px;
            background-color:whitesmoke;
            outline:none;
            border:1px solid rgba(0,0,0,0.5);
            font-family: Source Sans Pro;
            font-weight:lighter;
            font-size: 14px;
            margin-bottom:10px;
           padding-left: 10px;
           border-radius: 5px;
        box-sizing: border-box;
        }
        p.change{
            font-size: 12px;
            

        }
       
       .mb-3{
           color: black;
           
       }
       strong.do{
           background-color :whitesmoke;
           height:30px;
           width:30px;
       }
       
       
        </style>

  </head>
  <body >
      
  <div
      class="container-md border border-primary border-2 mt-5"
      id="outer-wrap"
    >
      <div class="display">
        
         <!-- <ul>
        <?php foreach($errors as $error):?>
          <li><?= $error?></li>
          <?php endforeach;?>
          </ul>  -->
        <div class="size">
          <form method="post">
          <h2 class="text-center text-primary pt-2 fs-1"><strong>Signup</strong></h2>
            <div class="mb-3"><span class="mb-3-addon"><i class="fa fa-user"></i></span>
              <label for="name" class="form-label text-primary"><strong>Name</strong></label>
              <input
                class="form-control"
                type="text"
                placeholder="Enter Your Name"
                name="name"
                id="name"/>
                 <!-- value=" <?= htmlspecialchars($user->name)?>" 
               required/>  -->
            </div>
            <div class="mb-3">
              <label for="roll" class="form-label text-primary"
                ><strong>Roll Number</strong></label
              >
              <input
                class="form-control mb-2"
                type="text"
                name="roll"
                id="roll"
                placeholder="Enter Your Roll Number"/>
                 <!-- value= "<?= htmlspecialchars($user->roll)?>" 
               />  -->
            </div>
            <div class="mb-3"><span class="mb-3-addon"><i class="fa fa-paper-plane"></i></span>
              <label for="email" class="form-label text-primary"><strong>Email</strong></label>
              <input
                class="form-control"
                type="email"
                name="email"
                id="email"
                placeholder="Enter Your College Email"/>
                 <!-- value=" <?= htmlspecialchars($user->email)?>" 
               required/>  -->
            </div>
            <div class="mb-3">
              <label for="branch" class="form-label text-primary"
                ><strong>Chose Your Branch</strong></label
              >
              <select name="branch" id="branch" class="form-select" required>
                <option value="CSE">Computer Sceince</option>
                <option value="ECE">Electrical and Communication</option>
                <option value="ME">Mechanical </option>
                <option value="PI">Production </option>
                <option value="CE">Civil </option>
                <option value="EE">Electrical </option>
              </select>
            </div>
            <div class="mb-3"> <span class="mb-3-addon"><i class="fa fa-lock"></i></span>
              <label for="password" class="form-label text-primary"
                ><strong>Password</strong></label
              >
              <input
                class="form-control"
                type="password"
                name="password"
                id="password"
                placeholder="Enter Your Password"/>
                 <!-- value="<?= htmlspecialchars($user->password)?>" 
              required />  -->
            </div>
            <div class="mb-3"><span class="mb-3-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
              <label for="cpassword" class="form-label text-primary"
                ><strong>Confirm Password</strong></label
              >
              <input
                type="password"
                name="cpassword"
                id="cpassword"
                class="form-control"
                placeholder="Confirm Password"/>
                 <!-- value= "<?= htmlspecialchars($user->cpassword)?>" 
              required/>  -->
            </div>
            <button class="btn btn-primary mb-3"><strong class="do">Signup</strong></button>
          </form>
        </div>
        <p class="change">
         <strong> Already have an account?
            
         </strong>
          <a href="login.php" class="btn btn-primary mb-3"><strong class="do">Log In</strong></a>
        </p>
      </div>
    </div>
  </body>
</html>
