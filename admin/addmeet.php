<?php require '../functions/load.php';
$conn = require "../functions/db.php";
require '../header.php';
session_start();
AdAuth::requireLogIn();
?>


<?php
$meet = new AdminManage();


require 'meetForm.php';?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function add()
{
   
    let name = document.getElementById('meetname').value;
    let stime = document.getElementById('starttime').value;
    let etime = document.getElementById('endtime').value;
    let errors = [];
    if(name==='')
    errors.push('Please Enter The Name');
    if(stime==='')
    errors.push('Please Enter The Start Time');
    if(etime==='')
    errors.push('Please Enter The End Time');
    console.log(errors);
    if(errors.length===0)
    {
    $.ajax({
                  type: "POST", 
                  data: 
                  {
                    func2call:"addMeet",
                    name: name,
                    stime:stime,
                    etime:etime
                  },
                  url: "../classes/Fetchadmin.php",
                  success: function(response)
                  { 
                    console.log("Meet Added");
                    window.location.href="/admin/admin.php";
                  },
                error: function(response) 
                  {
                    console.log("error");
                  }
            })
    }
    else
    {
      const list = document.getElementById('error-list');
      for(let i =0;i<errors.length;i++)
      {
        let listItem = document.createElement('li');
        listItem.textContent = errors[i];
        list.append(listItem);
      }
    }

}



</script>






</body>

</html>