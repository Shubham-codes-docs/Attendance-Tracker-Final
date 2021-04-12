<?php
class Database{
   public function getConn(){
        $db_name = "attendance_tracker";
        $db_host = "localhost";
        $db_user = "admin";
        $db_password = "Admin@1234";
        $dsn='mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';
        try{
            $db= new PDO($dsn,$db_user,$db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch(PDOException $e){
            $e->getMessage();
            exit;
        }
        

    }
}