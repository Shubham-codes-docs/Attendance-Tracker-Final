<ul id='error-list' ></ul>
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
    <button type='button'  onclick="add()"  class="btn btn-primary">Add</button>
  
    </form>

