<?php 
require "functions/load.php";
$conn = require "./functions/db.php";
if(isset($_GET['id'])&&(isset($_GET['attid'])))
{
   $user = User::getById($conn,$_GET['id']);
  if (User::checkTime($conn,$_GET['attid'],$user->attendance_time))
  {
    if(isset($_GET['marked']))
   {
     $attended = $user->markAttendance($conn,$_GET['id'],$_GET['attid']);
     echo "Attendance Marked";
     
   }
  }
   else
   {
     echo "Late";
   }
}
else{
    $user=null;
}
?>