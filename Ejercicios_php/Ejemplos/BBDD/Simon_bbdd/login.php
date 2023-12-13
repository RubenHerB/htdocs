<?php
class login{
    function __construct(){
        
    }


    function log($n) {
        if($n){
        $connection = new mysqli('localhost', 'user','user', 'bdsimon');
    }else{
        $connection = new mysqli('localhost', 'admin','admin', 'bdsimon');
    }
    if ($connection->connect_error) die("Fatal Error");
    return $connection;}
   
}

class logininicial{
    function log() {
        $connection = new mysqli('localhost', 'login','', 'bdsimon');
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
}
}