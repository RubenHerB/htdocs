<?php
if (isset($_POST)){
    $query="SELECT * FROM `usuarios` WHERE `DNI` = ".$_POST["dni"];
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}

echo json_encode($result);
}

