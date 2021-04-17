<?php


//database connnection
$username = "admin";
$password = "Admin@1234";
$server = 'localhost';
$db = 'attendance';

$con =mysqli_connect($server,$user,$password,$db);
 
if($con){
  // echo "Connection successful";

}
else{
    echo "no connection";
}
//connection done
 



?>