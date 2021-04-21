<?php
require '../functions/load.php';
$conn = require "../functions/db.php";
require '../header.php';
session_start();
AdAuth::requireLogIn();
$meet = AdminManage::getById($conn,$_GET['id']);

$errors=[];

if(isset($_GET['id']))
{
    

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST['meetname']==='')
    {
        $errors[]="Please Enter A Valid Name";
    }
    
    if($_POST['starttime']==='')
    {
        $errors[]="Please Enter A Start Time";
    }
    
    if($_POST['endingtime']==='')
    {
        $errors[]="Please Enter A End Time";
    }
    
    if(count($errors)===0)
    {
    $meet->meetName=$_POST['meetname'];
    $meet->startTime=$_POST['starttime'];
    $meet->endTime=$_POST['endingtime'];
    if($meet->editMeet($conn,$_GET['id']))
    {
      Url::redirect("/admin/admin.php");
    }    
     }
}
}

?>
          <div class="container" style="width:50%;padding:5px;margin-top:50px; border-color:#e9e9e9!important;-webkit-box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);
        box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);">
        <h2 class="text-center fs-2 ">Edit Meets</h2>
        <ul>
        <?php foreach($errors as $error):?>
          <li><?= $error?></li>
          <?php endforeach;?>
          </ul>
        <form method="post">
            <div class="col-6 m-4">
                <label for="starttime" class="form-label ml-2" style="font-size:16px;font-weight:500;">Enter the meeting name</label>
                <input class="form-control" id="meetname" name='meetname' placeholder="Meeting name" value="<?=htmlspecialchars($meet->meetName)?>">
            </div>
            <div class="col-6 m-4">
                <label for="starttime" class="form-label ml-2" style="font-size:16px;font-weight:500;">Enter the start Time</label>
                <input type="datetime-local" class="form-control" id="starttime" placeholder="Start Time" name="starttime"
                value=<?=htmlspecialchars(str_replace(' ', 'T', $meet->startTime));?>>
            </div>
            <div class="col-6 m-4">
                <label for="endingtime" class="form-label ml-2" style="font-size:16px;font-weight:500;">Enter the end Time</label>
                <input type="datetime-local" class="form-control" id="endtime" placeholder="End Time" name="endingtime"
                value=<?=htmlspecialchars(str_replace(' ', 'T', $meet->endTime));?> >
            </div>
            <div class="col-4 m-4">
            <button type='submit'  class="btn btn-primary">Edit</button></div>
        </form>
        </div>
</body>
</html>