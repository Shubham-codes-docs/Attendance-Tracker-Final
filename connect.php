<?php


//database connnection
$username = "root";
$password = "";
$server = 'localhost';
$db = 'attendance';

$con =mysqli_connect($server,$username,$password,$db);
 
if($con){
  // echo "Connection successful";

}
else{
    echo "no connection";
}
//connection done
 



?>