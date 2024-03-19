<?php
if (isset($_POST)){
    $query="SELECT cantidad,codArticulo FROM lineas WHERE CodLinea like '".$_POST['id']."'";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
    if (!$result){
        die("Fatal Error");
    }

foreach ($result as $row){
    $n['cantidad'] = $row['cantidad'];
    $n['codArticulo'] = $row['codArticulo'];
}
$query="SELECT cantidad FROM articulos WHERE codArticulo like '".$n['codArticulo']."'";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}

    foreach ($result as $row){
        $n['cantidadi'] = $row['cantidad'];
    }
    echo json_encode($n);
$query="UPDATE `articulos` SET `cantidad`='".((int)$n['cantidad']+(int)$n['cantidadi'])."' WHERE codArticulo like '".$n['codArticulo']."'";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}



$query="DELETE FROM `lineas` WHERE CodLinea like '".$_POST['id']."'";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}

}



