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
        $sql = "INSERT INTO user(name,roll,email,branch,pass,totalAtten)VALUES(:name,:roll,:email,:branch,:pass,0)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name',$name,PDO::PARAM_STR);
        $stmt->bindValue(':roll',$roll,PDO::PARAM_STR);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':branch',$branch,PDO::PARAM_STR);
        $stmt->bindValue(':pass',$password,PDO::PARAM_STR);
        if($stmt->execute())
        {
            return true;
        }
    }
}