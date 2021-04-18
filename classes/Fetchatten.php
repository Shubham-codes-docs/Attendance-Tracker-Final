<?php
session_start();
    $userid = $_SESSION['userid'];
     require "../functions/load.php";
     $conn = require "../functions/db.php";
     if(isset($userid))
        {
        $user = User::getById($conn,$userid);
        }
        else{
            $user=null;
        }
     if($_POST['func2call']==='fetchAtten')
    {
        User::fetchAtten();
        User::fetchUserMeet($userid);
    }

    if($_POST['func2call']==='fetchMeets')
    {
        User::fetchAtten();
    }


    if($_POST['func2call']==='markattend')
    {
        if(isset($_POST['meetid']))
            {
                 if (User::checkTime($conn,$_POST['meetid']))
                  {
                       $attended = $user->markAttendance($conn,$userid);
                       if($attended)
                       {
                          $his = $user->setHistory($conn,$userid,$_POST['meetid']);
                          $count = $user->totalAtten;
                       }
                }
                else
                {
                    echo "Late";
                }
            }
    }
    if($_POST['func2call']==='getTotal')
    {
      $total =  $user->getTotal($conn,$userid);
    }

    if($_POST['func2call']==='deleteMeets')
    {
        if(isset($_POST['id']))
        {
            $meet = AdminManage::getById($conn,$_POST['id']);
           
            $meet->deleteMeet($conn,$meet->id);
        }
    }
    if($_POST['func2call']==='addMeet')
    {
        $meet = new AdminManage();
        $res = $meet->addMeets($conn,$_POST['name'],$_POST['stime'],$_POST['etime']);
        $meet->addInUser($conn,$res,$_POST['name'],$_POST['stime'],$_POST['etime']);
    }
