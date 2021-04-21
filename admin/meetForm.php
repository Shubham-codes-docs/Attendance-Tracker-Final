
<div class="container" style="width:50%;padding:5px;margin-top:50px; border-color:#e9e9e9!important;-webkit-box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);
box-shadow: 2px 4px 24px -4px rgba(0,0,0,0.75);">
<h2 class="text-center fs-2 " >Add Meets</h2>
<ul id='error-list' ></ul>
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
    <button type='button'  onclick="add()"  class="btn btn-primary">Add</button></div>
</form>
</div>


