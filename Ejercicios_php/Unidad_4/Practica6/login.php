<?php
class login{
    function __construct(){
        
    }


    function log_admin() {
        $connection = new mysqli('localhost', "admincomercio","admincomercio", 'comercio');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

    function log_user() {
        $connection = new mysqli('localhost', "usuariocomercio","usuariocomercio", 'comercio');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

    function log_login(){
        $connection = new mysqli('localhost', 'logincomercio','', 'comercio');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

    function log_register(){
        $connection = new mysqli('localhost', 'registercomercio','', 'comercio');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }
}