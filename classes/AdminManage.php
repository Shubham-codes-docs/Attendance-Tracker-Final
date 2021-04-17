<?php
class AdminManage{

    public $id;
    public  $meetName;
    public $startTime;
    public $endTime;

    static function getById($conn,$id)
{
    $sql= "SELECT * FROM adminmeet WHERE  id=:id";
        $stmt =$conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'AdminManage');
        if($stmt->execute())
         {
           return $stmt->fetch(); 
         }
}
    
    public function deleteMeet($conn,$id){
    $sql = "DELETE FROM adminmeet where id = :id";
    $sql2 = "DELETE FROM usermeet where meetid = :id";
    $stmt2 = $conn->prepare($sql2);
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    $stmt2->bindValue(':id',$id,PDO::PARAM_INT);
    if(($stmt->execute()) && ($stmt2->execute()))
    Url::redirect('/admin/admin.php');
}

public static function addMeets($conn,$name,$stime,$etime){
    require '../functions/load.php';
    $sql = "INSERT INTO adminmeet(meetName,startTime,endTime)VALUES(:name,:stime,:etime)";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':stime',$stime,PDO::PARAM_STR);
    $stmt->bindValue(':etime',$etime,PDO::PARAM_STR);

    if($stmt->execute())
    {
       
       return $conn->lastInsertId();
    
    //Url::redirect('/admin/admin.php');
    
}
}
public function editMeet($conn,$id)
{
    $sql = "UPDATE  adminmeet SET meetName=:meetName,startTime=:startTime,endTime=:endTime WHERE id=:id";
    $sql2 = "UPDATE  usermeet SET meetName=:meetName,startTime=:startTime,endTime=:endTime WHERE meetid=:id";
    $stmt=$conn->prepare($sql);
    $stmt2=$conn->prepare($sql2);
    $stmt->bindValue(':id',$this->id,PDO::PARAM_INT);
    $stmt->bindValue(':meetName',$this->meetName,PDO::PARAM_STR);
    $stmt->bindValue(':startTime',$this->startTime,PDO::PARAM_STR);
    $stmt->bindValue(':endTime',$this->endTime,PDO::PARAM_STR);
    $stmt2->bindValue(':id',$this->id,PDO::PARAM_INT);
    $stmt2->bindValue(':meetName',$this->meetName,PDO::PARAM_STR);
    $stmt2->bindValue(':startTime',$this->startTime,PDO::PARAM_STR);
    $stmt2->bindValue(':endTime',$this->endTime,PDO::PARAM_STR);
    if(($stmt->execute())&&($stmt2->execute()))
    {
    return true;
    }
}

public  function addInUser($conn,$id,$name,$stime,$etime)
{
    $sql3 = "SELECT id From user ";
    $result = $conn->query($sql3);
    $userid = $result->fetchAll();
    // echo (json_encode($userid));
    $count = count(($userid));
    echo $count;
for($i=0;$i<$count;$i++)
{
    // echo $userid[$i]["id"];
     $sql4 = "INSERT INTO usermeet(meetid,meetName,startTime,endTime,userid)VALUES(:mid,:name,:stime,:etime,:useid)";
     $stmt2=$conn->prepare($sql4);
     $stmt2->bindValue(':mid',$id,PDO::PARAM_INT);
     $stmt2->bindValue(':name',$name,PDO::PARAM_STR);
     $stmt2->bindValue(':stime',$stime,PDO::PARAM_STR);
     $stmt2->bindValue(':etime',$etime,PDO::PARAM_STR);
     $stmt2->bindValue(':useid',$userid[$i]["id"],PDO::PARAM_INT);
     $stmt2->execute();
}
Url::redirect('/admin/admin.php');
}

}