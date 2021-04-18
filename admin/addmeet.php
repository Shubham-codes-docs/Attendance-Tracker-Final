<?php require '../functions/load.php';
$conn = require "../functions/db.php";
require '../header.php';
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
    $.ajax({
                  type: "POST", 
                  data: 
                  {
                    func2call:"addMeet",
                    name: name,
                    stime:stime,
                    etime:etime
                  },
                  url: "../classes/Fetchatten.php",
                  success: function(response)
                  { 
                    console.log("Meet Added");
                    //window.location.href="/admin/admin.php";
                  },
                error: function(response) 
                  {
                    console.log("error");
                  }
            })

}



</script>






</body>

</html>