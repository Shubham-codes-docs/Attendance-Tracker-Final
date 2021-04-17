<?php

class Url{

    public static function redirect($path){

        if((isset($_SERVER['HTTPS']))&&($_SERVER['HTTPS']!='off')){
            $protocol='https';
        }
        else{
            $protocol='http';
        }
        header("LOCATION:{$protocol}://{$_SERVER['HTTP_HOST']}{$path}");

    }

}