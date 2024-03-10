<?php
if (isset($_POST)){
    $filtro="";
    if (isset($_POST['pocos'])){
        if($_POST['pocos']==1){
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
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
echo json_decode($result);
}

