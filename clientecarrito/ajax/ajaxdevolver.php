<?php
if (isset($_POST)){

    $query="select cantidad,codArticulo from lineas where CodLinea like '".$_POST['id']."'";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
foreach ($result as $row){
    $c=$row['cantidad'];
    $art=$row['codArticulo'];
}
$c2=$c-$_POST['cantidad'];



$query="SELECT cantidad FROM articulos WHERE codArticulo like '$art'";
$result = $connection->query($query);
    if (!$result){
        die("Fatal Error");
    }

foreach ($result as $row){
    $n = $row['cantidad'];
}






if($c2<=0){
$query="DELETE FROM `lineas` WHERE CodLinea like '".$_POST['id']."'";
$query2="UPDATE `articulos` SET `cantidad`='".((int)$n+$c)."' WHERE codArticulo like '".$n['codArticulo']."'";

}else{
    $query="UPDATE `lineas` SET `cantidad`='$c2' WHERE CodLinea like '".$_POST['id']."'";
    $query2="UPDATE `articulos` SET `cantidad`='".((int)$n+$_POST['cantidad'])."' WHERE codArticulo like '$art'";
}

$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
$result = $connection->query($query2);
if (!$result){
    die("Fatal Error");
}
}

