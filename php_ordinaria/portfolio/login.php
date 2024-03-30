<?php
class Login{

    function __construct(){
    }


    public function log($user) {

        switch ($user){
            case 1:
                $usu="asistente";
                $pass="asistente";
            break;
            case 2:
                $usu="medico";
                $pass="medico";
            break;
            case 3:
                $usu="adminconsulta";
                $pass="adminconsulta";
            break;
            default:
                $usu="loginconsulta";
                $pass="loginconsulta";
            break;
        }

        $connection = new mysqli('localhost', $usu,$pass, 'consultas');
    
    if ($connection->connect_error) die("Fatal Error");
    return $connection;
    }

}
