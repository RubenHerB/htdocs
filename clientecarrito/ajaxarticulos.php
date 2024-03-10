<?php

    
    $query="SELECT * FROM `articulos`";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
echo json_encode($result);


