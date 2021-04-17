<?php
require '../functions/load.php';
$conn = require "../functions/db.php";
require '../header.php';
$meet = AdminManage::getById($conn,$_GET['id']);
// var_dump($meet->meetName);
if(isset($_GET['id']))
{
    

if($_SERVER["REQUEST_METHOD"]=="POST"){
        
    $meet->meetName=$_POST['meetname'];
    $meet->startTime=$_POST['starttime'];
    $meet->endTime=$_POST['endingtime'];
    if($meet->editMeet($conn,$_GET['id']))
    {
      Url::redirect("/admin/admin.php");
}    
else
echo "No";
}
}

?>
<form method="post">
    
    <div class="mb-3">
    <label for="meetname" class="form-label">Meet Name</label>
    <input class="form-control" id="meetname" name='meetname' placeholder="Meet Name" value="<?=htmlspecialchars($meet->meetName)?>">
    </div>
    <div class="mb-3">
    <label for="starttime" class="form-label">Start Time</label>
    <input type="datetime-local" class="form-control" id="starttime" placeholder="Start Time" name="starttime" value=<?=htmlspecialchars(str_replace(' ', 'T', $meet->startTime));?>>
    </div>
    <div class="mb-3">
    <label for="endingtime" class="form-label">End Time</label>
    <input type="datetime-local" class="form-control" id="endtime" placeholder="End Time" name="endingtime" value=<?=htmlspecialchars(str_replace(' ', 'T', $meet->endTime));?> >
    </div>
    <button   class="btn btn-primary">Update</button>
  
    </form>
</body>
</html>