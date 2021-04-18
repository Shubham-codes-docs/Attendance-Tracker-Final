<?php

class SignIn{
    public $name;
    public $roll;
    public $email;
    public $branch;
    public $password;
    public $cpassword;


    public static function isExisting($conn,$email){
        $sql = "SELECT * FROM user WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS,"Signin");
        $stmt->execute();
        $user = $stmt->fetch();
        if($user)
        return true;
        else
        return false;
    }
    
    public function addUser($conn,$name,$roll,$email,$branch,$password)
    {
        $password = password_hash($password,PASSWORD_DEFAULT );
        $sql = "INSERT INTO user(name,roll,email,branch,pass,totalAtten)VALUES(:name,:roll,:email,:branch,:pass,0)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name',$name,PDO::PARAM_STR);
        $stmt->bindValue(':roll',$roll,PDO::PARAM_STR);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':branch',$branch,PDO::PARAM_STR);
        $stmt->bindValue(':pass',$password,PDO::PARAM_STR);
        if($stmt->execute())
        {
            return $conn->lastInsertId();
        }
    }

public function manageMeets($conn,$id)
{
    $sql= "SELECT * FROM adminmeet";
    $result = $conn->query($sql);
    $meet = $result->fetchAll();
    $count = count(($meet));
    for($i=0;$i<$count;$i++)
    {
        $sql2 = "INSERT INTO usermeet(meetid,meetName,startTime,endTime,userid)VALUES(:mid,:name,:stime,:etime,:useid)";
        $stmt2=$conn->prepare($sql2);
        $stmt2->bindValue(':mid',$meet[$i]["id"],PDO::PARAM_INT);
        $stmt2->bindValue(':name',$meet[$i]["meetName"],PDO::PARAM_STR);
        $stmt2->bindValue(':stime',$meet[$i]['startTime'],PDO::PARAM_STR);
        $stmt2->bindValue(':etime',$meet[$i]['endTime'],PDO::PARAM_STR);
        $stmt2->bindValue(':useid',$id,PDO::PARAM_INT);
        $stmt2->execute();
    }
}

}