<?php

    
    $query="SELECT * FROM articulos";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
var_dump($result);
foreach ($result as $row){
    echo '<br>';
    var_dump($row);
}
