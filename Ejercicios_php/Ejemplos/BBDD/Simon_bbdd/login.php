<?php
class login{
    function __construct(){
        
    }


    function log($user,$pass) {
        $connection = new mysqli('localhost', $admin,$pass, 'bdsimon');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

    function log_rank(){
        $connection = new mysqli('localhost', 'simons','', 'bdsimon');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }
}