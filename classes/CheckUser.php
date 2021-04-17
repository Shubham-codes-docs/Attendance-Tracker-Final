<?php 
class CheckUser{

public $id;
public $username;
public $pass;

public static function authenticate($conn,$username,$password){
    $sql= "SELECT * FROM user WHERE email=:username";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(':username',$username,PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_CLASS,"CheckUser");
    $stmt->execute();
    $user=$stmt->fetch();
    $id = $user->id;
    if($user){
        if($user->pass===$password)
        return $user->id;
    }
}

public static function adminCheck($conn,$username,$password){
    $sql= "SELECT * FROM admin WHERE name=:username";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(':username',$username,PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_CLASS,"CheckUser");
    $stmt->execute();
    $user=$stmt->fetch();
    if($user){
        if($user->pass===$password)
        return 1;
    }
}

}