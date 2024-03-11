<?php
if (isset($_POST)){
    $query="SELECT * FROM `articulos`";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
$rows=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($rows);
}

