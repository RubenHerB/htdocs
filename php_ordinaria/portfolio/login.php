<?php
class Login{

    function __construct(){
    }


    public function log($user) {

        switch ($user){
            case "Asistente":
                $usu="asistente";
                $pass="asistente";
            break;
            case "Medico":
                $usu="medico";
                $pass="medico";
            break;
            case "Administrador":
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
