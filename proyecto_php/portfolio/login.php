<?php
class login{
    function __construct(){
        
    }


    function log($user) {
        $usu="";
        $pass="";
        switch ($user){
            case 0:
                $usu="registrotutorlegal";
            break;
            case 1:
                $usu="profesor";
            break;
            case 2:
                $usu="registrotutorlegal";
            break;
        }

        $connection = new mysqli('localhost', $usu,$pass, 'bdsimon');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

}