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
                $pass="profesor";
            break;
            case 2:
                $usu="tutor";
                $pass="tutor";
            break;
            case 3:
                $usu="admin";
                $pass="admin";
            break;
            default:
                $usu="loginincidencias";
            break;
        }

        $connection = new mysqli('localhost', $usu,$pass, 'incidencias');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

}