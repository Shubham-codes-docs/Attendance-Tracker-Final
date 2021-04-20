<?php require '../functions/load.php';
$conn = require "../functions/db.php";
require '../header.php';
session_start();
AdAuth::requireLogIn();
?>

<a href="logout.php">Log Out</a>
    <table class="table table-striped table-hover">
        <h4 style="display: block;text-align:center;margin-top:3%;font-family: 'Lobster', cursive; ">Upcoming Meetings</h4>

        <div style="display: flex; justify-content:center;margin-left:10%;margin-right:10%;margin-top:2% " class="btn-group" role="group" aria-label="Basic example">


             <button type="button" class="btn btn-secondary" onclick = "meet('p')"  >Previous Meetings</button></a>
             <button type="button" class="btn btn-primary" onclick = "meet('u')" >Upcoming Meetings</button></a>
            
            <a href="addmeet.php"><button type="button" class="btn btn-danger">
                    + New Meeting
                </button>
                </a>
        </div>
        <thead>
            <tr>
                <th scope="col">Serial No</th>
                <th scope="col">Meeting Details</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody id= 'tbody'>
        </tbody>

    </table>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function meet(status){
            let arr = [];
            if(arr.length == 0){
                const tbody = document.getElementById('tbody');
                tbody.innerHTML = ``;
            }
            $.ajax({
                    type: "POST", 
                    data: {func2call:"fetchMeets"},
                    url: "../classes/Fetchadmin.php",
                    success: function(response)
                    {  
                        arr = JSON.parse(response);
                        
                        const tbody = document.getElementById('tbody');
                        for(let i=0;i<arr.length;i++)
                        {
                            const tel = document.createElement('tr');
                            let stime = Date.parse(arr[i].startTime);
                            let etime = Date.parse(arr[i].endTime);
                            let ctime = Date.parse(new Date());
                            if(status==='p')
                            {
                                let p=0;
                                if(etime<ctime)
                                {
                                    tel.innerHTML = `<th>${arr[i].id}</th>
                                    <td>${arr[i].meetName}</td>
                                    <td>${arr[i].startTime}</td>
                                    <td>${arr[i].endTime}</td>
                                    <td><a href=/admin/updateMeet.php?id=${arr[i].id}><button"><i class="fas fa-edit"></i></button></a></td>
                                    <td><button onclick="deleteMeet(${arr[i].id})"><i class="fas fa-trash-alt"></i></button></td>
                                    `
                                }
                                p++;
                            }
                 
                            if(status==='u')
                            {
                            let p=0;
                            if((stime>ctime)||(ctime<etime))
                            {
                                tel.innerHTML = `<th>${arr[i]. id}</th>
                                <td>${arr[i].meetName}</td>
                                <td>${arr[i].startTime}</td>
                                <td>${arr[i].endTime}</td>
                                <td><a href=/admin/updateMeet.php?id=${arr[i].id}><button"><i class="fas fa-edit"></i></button></a></td>
                                <td><button onclick="deleteMeet(${arr[i].id})"><i class="fas fa-trash-alt"></i></button></td>
                                `
                            }
                            p++;
                            }
                            tbody.append(tel);
                        }
                   
                    },
                    error: function(response) 
                    {
                        console.log("error");
                    }
                })
        }

 function deleteMeet(id){
    
                      const el = event.target;
                      const parent = el.parentNode.parentNode.parentNode; 
                     parent.remove();
     
    $.ajax({
        
                  type: "POST", 
                  data:
                  {
                      func2call:"deleteMeets",
                      id:id,
                  },
                  url: "../classes/Fetchadmin.php",
                  success: function(response){
                    console.log("Meet Deleted");
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
