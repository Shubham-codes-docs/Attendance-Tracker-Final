<?php
 $server="localhost";
 $user="root";
$password="";
$db = "signup";
$con = mysqli_connect($server,$user,$password,$db);
  if ($con){     ?>
    <script>
     echo("connected"); 
         </script> 
      <?php
        }
        else  {        ?>
    <script>
     alert("could not connect");  
       </script>
      <?php
              }


?>