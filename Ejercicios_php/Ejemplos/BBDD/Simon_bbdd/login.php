<?php
class login{
    function __construct(){
        
    }
    function log() {
        $connection = new mysqli('localhost', 'user','user', 'bdsimon');
    if ($connection->connect_error) die("Fatal Error");
    return $connection;}
   
}