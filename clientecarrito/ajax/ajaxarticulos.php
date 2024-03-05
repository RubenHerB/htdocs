<?php
if (isset($_POST)){
    $filtro="";
    if (isset($_POST['pocos'])){
        if($_POST['pocos']){
            $filtro=" WHERE cantidad<cantidadMinima";
        }else{
            $filtro=" WHERE NOT cantidad<cantidadMinima";
        }
    }
    $query="SELECT * FROM `articulos`".$filtro;
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$connection=(new login)->log($_SESSION['rolnow']);
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
}

