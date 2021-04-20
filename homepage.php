<?php 
require "functions/load.php";
$conn = require "./functions/db.php";
session_start();
Auth::requireLogIn();
if($_GET['id']!==$_SESSION['userid'])
{
  die("Unauthorized");
}
if(isset($_GET['id']))
{
   $totalmeets = User::totalMeets($conn);
   $user = User::getById($conn,$_GET['id']);
}
else{
    $user=null;
}
?>


<?php require "header.php";?>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Attendance Tracker</a>
        <a class='nav nav-element'  href="editprofile.php?id=<?= $_GET['id']?>">Edit</a>
        <a href="logout.php">Log Out</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <div class="container mt-5">
      <section class="display txt">
        <div>
          <h3>Name</h3>
          <p id='name'><?=$user->name?></p>
        </div>
        <div>
          <h3>Roll No.</h3>
          <p id='roll'><?=$user->roll?></p>
        </div>
        <div>
          <h3>Branch</h3>
          <p id='branch'><?=$user->branch?></p>
        </div>
        <div>
          <h3>Attendance</h3>
         <p> <p  style = "display:inline"id='attendance'><?=$user->totalAtten ?></p>/<?=$totalmeets?></p>
        </div>
      <nav style="width:100%;">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#previous" type="button" role="tab"
           aria-controls="previous" aria-selected="true" onclick="abc('p')">Previous Meeting</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#current" type="button" role="tab"
           aria-controls="current" aria-selected="false"onclick="abc('c')">Current Meeting</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab"
           aria-controls="upcoming" aria-selected="false" onclick="abc('u')">Upcoming Meeting</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent"  style="width:100%;">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Meeting Name</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Attendance</th>
              </tr>
            </thead>
            <tbody id='tablebody' >
              
            </tbody>
         </table>
        </div>
      </div>
      </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
   function abc(status){
      // let p=0;
      let arr = [];
      if(arr.length == 0){
        const tbody = document.getElementById('tablebody');
        tbody.innerHTML = ``;
      }
      $.ajax({
            type: "POST", 
            data: {func2call:"fetchAtten"},
            url: "./classes/Fetchatten.php",
            success: function(response)
              { 
                let splitted = response.split('|'); 
                arr = JSON.parse(splitted[1]);
               const tbody = document.getElementById('tablebody');
               for(let i=0;i<arr.length;i++)
               {
                const tel = document.createElement('tr');
                let stime = Date.parse(arr[i].startTime);
                 let etime = Date.parse(arr[i].endTime);
                 let ctime = Date.parse(new Date());
                 let res = Math.round((ctime - etime)/1000);
                 if(status==='p')
                 {
                   let p=0;
                  if(res>1800)
                  {
                    tel.innerHTML = arr[i].attend==='0'? `<th>${arr[i].meetid}</th>
                    <td>${arr[i].meetName}</td>
                    <td>${arr[i].startTime}</td>
                    <td>${arr[i].endTime}</td>
                    <td><p>Absent</p></td>
                    `:arr[i].attend==='1'?`<th>${arr[i].meetid}</th>
                    <td>${arr[i].meetName}</td>
                    <td>${arr[i].startTime}</td>
                    <td>${arr[i].endTime}</td>
                    <td><p>Present</p></td>`:`<th>${arr[i].meetid}</th>
                    <td>${arr[i].meetName}</td>
                    <td>${arr[i].startTime}</td>
                    <td>${arr[i].endTime}</td>
                    <td><p>Absent</p></td>`;
                  }
                  p++;
                 }
                 
                 if(status==='u')
                 {
                   let p=0;
                  if(stime>ctime)
                  {
                    tel.innerHTML = `<th>${arr[i].meetid}</th>
                    <td>${arr[i].meetName}</td>
                    <td>${arr[i].startTime}</td>
                    <td>${arr[i].endTime}</td>
                    <td><p>--------</p></td>
                    `;
                  }
                  p++;
                }
                if(status==='c')
                 {
                   let p=0;
                  if ((stime<ctime)&&((res<=1800)))
                  {
                    tel.innerHTML = localStorage.marked!==arr[i].meetid?`<th>${arr[i].meetid}</th>
                    <td>${arr[i].meetName}</td>
                    <td>${arr[i].startTime}</td>
                    <td>${arr[i].endTime}</td>
                    <td><button type="button" id='marker' class="btn btn-info btn-sm" onclick="mark(${arr[i].meetid})">Mark</button></td>
                    `:
                    `<th>${arr[i].meetid}</th>
                    <td>${arr[i].meetName}</td>
                    <td>${arr[i].startTime}</td>
                    <td>${arr[i].endTime}</td>
                    <td><button type="button" id='marker' class="btn btn-info btn-sm" disabled='true' )">Marked</button></td>
                    `;
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
  };
    function mark(id)
      {
          $.ajax({
                  type: "POST", 
                  data: 
                  {
                    func2call:"markattend",
                    meetid:id,
                  },
                  url: "./classes/Fetchatten.php",
                  success: function(response)
                  { 
                    console.log(response);
                    
                    
                  },
                error: function(response) 
                  {
                    console.log("error");
                  }
            })
            getTotal(id);
            let time =  Date.parse(new Date());
            let t = new Date();
            let extime = t.setMinutes(50);
            if(time<extime)
            {
              localStorage.setItem('marked',id);
            }
              if(localStorage.marked)
              {
                console.log(localStorage.marked);
                const button=document.getElementById('marker');
                button.innerHTML = `<p>Marked</p>`;
                button.disabled = true;
              }
            
            else{
              localStorage.removeItem('marked');
            }
            

      }
      function getTotal(id)
      {
        $.ajax({
                  type: "POST", 
                  data: 
                  {
                    func2call:"getTotal",
                    userid:id,
                  },
                  url: "./classes/Fetchatten.php",
                  success: function(response)
                  { 
                    let splitted = response.split(','); 
                    let count = JSON.parse(splitted); 
                   const att = document.getElementById('attendance');
                   att.innerHTML=`<p  style = "display:inline">${count}</p>`;
                    
                    
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