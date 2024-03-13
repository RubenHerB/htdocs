<?php
if (isset($_POST)){
    $query="INSERT INTO `ventas` ( `fecha`, `DNI`) VALUES ('".date('Y-m-d')."', '".$_POST['dni']."')";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
$query = "SELECT codVenta FROM ventas order by codVenta desc limit 1";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
foreach ($result as $row){
    $n=$row['codVenta'];
}

unset($_POST['dni']);

var_dump($_POST);

foreach ($_POST as $key=>$row){
        $query = "INSERT INTO `lineas` (`codVenta`, `codArticulo`, `cantidad`, `precio`) VALUES ('$n', '$key', '$row', '0')";
        $result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
$query = "select cantidad from `articulos` where codArticulo like $key";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
foreach ($result as $row){
    $a=$row['cantidad'];
}
$a-=$row;
$query="UPDATE `articulos` SET `cantidad`= $a WHERE `codArticulo` like $key";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
}
}
