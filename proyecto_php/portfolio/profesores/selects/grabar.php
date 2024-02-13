<?php 
var_dump($_POST);
session_start(); 
    if(!isset($_SESSION)){
        header("Location: ../index.php");
        
    }else{
        if($_SESSION["tipo"]!=0){
            header("Location: redirect.php");
        }else{
            if($_SESSION["rolnow"]!=1){
                header("Location: ../redirect.php");
            }
        }

    }
$day = strtotime($_POST["fecha"]);
$day = date('Y-m-d H:i:s', $day)
$query="INSERT INTO incidencia (IdClase, Fecha, IdProfesor, Observaciones, TipoIncidencia,IdAlumno,Asignatura) VALUES ('$day1',
(".$_POST['idc'].", $day,".$_SESSION['id'].", ".$_POST['observaciones'].", ".$_POST['tipo'].", ".$_POST['idalumno'].", ".$_POST['ida'].")";
?>