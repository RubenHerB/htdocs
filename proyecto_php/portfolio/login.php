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
                $usu="profesor";
                $pass="profesor";
            break;
            case 3:
                $usu="tutot";
                $pass="tutot";
            break;
            case 4:
                $usu="adminisrativo";
                $pass="adminisrativo";
            break;
            default:
                $usu="loginincidencias";
            break;
        }

        $connection = new mysqli('localhost', $usu,$pass, 'bdsimon');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

}