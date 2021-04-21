<?php
class User{

  public  $name;
  public $roll;
  public $email;
  public  $branch;
  public  $id;
  public $pass;
  public  $totalAtten;
  public $errors;


public static function fetchAtten()
{
  require "../functions/load.php";
  $conn = require "../functions/db.php";
  $sql= "SELECT * FROM adminmeet";
  $results =$conn->query($sql);
  $meets =$results->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($meets);
}

public static function fetchUserMeet($id){
  require "../functions/load.php";
  $conn = require "../functions/db.php";
  $sql= "SELECT * FROM usermeet where userid=:id ";
  $stmt =$conn->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  if($stmt->execute())
  {
  $meets =$stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "|".json_encode($meets);
  }
}

static function getById($conn,$id)
{
    $sql= "SELECT * FROM user WHERE  id=:id";
        $stmt =$conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        if($stmt->execute())
         {
           return $stmt->fetch(); 
         }
}

public function markAttendance($conn,$id)
{
  $att= $this->totalAtten+1;
  $sql="UPDATE user SET totalAtten=:att where id=:id";
  $stmt= $conn->prepare($sql);
  $stmt->bindValue(':att',$att,PDO::PARAM_INT);
  $stmt->bindValue(':id',$this->id,PDO::PARAM_INT);
  return $stmt->execute();
}

public function setHistory($conn,$userid,$meetid)
{
  $value = 1;
  $sql = "UPDATE usermeet SET attend=:val where userid=:id AND meetid=:mid";
  $stmt= $conn->prepare($sql);
  $stmt->bindValue(':val',$value,PDO::PARAM_INT);
  $stmt->bindValue(':id',$userid,PDO::PARAM_INT);
  $stmt->bindValue(':mid',$meetid,PDO::PARAM_INT);
  return $stmt->execute();

}

public static function checkTime($conn,$id)
{
  $sql = "SELECT endTime FROM adminmeet WHERE id=:id";
  $stmt=$conn->prepare($sql);
  $stmt->bindValue(":id",$id,PDO::PARAM_INT);
  $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        if($stmt->execute())
         {
           $creation_time=$stmt->fetch();
           date_default_timezone_set('Asia/Kolkata');
           $endTime = strtotime($creation_time->endTime);
          $user_time = strtotime( date('h:i:s a'));
           $result=  $user_time - $endTime;
           if($result<1800)
           {
            return true;
           }
           
           else
           {
            return false;
           }

         }
}

public function getTotal($conn,$id)
{
  $sql = "SELECT totalAtten FROM user WHERE id=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  if($stmt->execute())
  {
    $attendance = $stmt->fetch(PDO::FETCH_ASSOC);
   echo json_encode($attendance['totalAtten']);
  }
}

public static function totalMeets($conn)
{
  $sql = "SELECT COUNT(*) FROM adminmeet";
  $result = $conn->query($sql);
  $rows = $result->fetch();
  return $rows[0];
}

public function edit($conn,$id)
{
  $sql = "UPDATE  user SET name=:name,roll=:roll,email=:email,branch=:branch,pass=:pass WHERE id=:id";
  $this->pass = password_hash($this->pass,PASSWORD_DEFAULT);
  $stmt=$conn->prepare($sql);
  $stmt->bindValue(':name',$this->name,PDO::PARAM_STR);
  $stmt->bindValue(':roll',$this->roll,PDO::PARAM_STR);
  $stmt->bindValue(':email',$this->email,PDO::PARAM_STR);
  $stmt->bindValue(':branch',$this->branch,PDO::PARAM_STR);
  $stmt->bindValue(':pass',$this->pass,PDO::PARAM_STR);
  $stmt->bindValue(':id',$id,PDO::PARAM_INT);
  if($stmt->execute())
  return true;
}

}
