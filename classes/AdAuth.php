<?php
class AdAuth
{
    
  public static function IsLoggedIn()
    {
      return (isset($_SESSION['is_adminlogged_in'])&&$_SESSION['is_adminlogged_in']);
     }

  public static function requireLogIn(){
    if(!static::IsLoggedIn())
    die("Unauthorized");
  }

  public static function logIn(){
    $_SESSION['is_adminlogged_in']=true;
    session_regenerate_id(true);
  }

  public static function logOut(){
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
         $params["path"], $params["domain"],
         $params["secure"], $params["httponly"]
         );
      }
    session_destroy();
  }

}