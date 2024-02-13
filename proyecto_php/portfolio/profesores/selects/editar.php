<?php 
// var_dump($_POST);
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

$query="UPDATE incidencia SET  Observaciones='".$_POST['observaciones']."', TipoIncidencia=".$_POST['tipo']." where IdIncidencia LIKE ".$_POST['id'];
// var_dump($query);
include "../../login.php";
$con=(new login)->log($_SESSION['rolnow']);
$result = $con->query($query);
if (!$result) die("Fatal Error");
echo "<div class=\"alert alert-success\" role=\"alert\">La incidencia ha sido editada</div>"
?>