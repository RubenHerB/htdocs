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
}else{
    return "Datos cambiados con exito";
}
}

