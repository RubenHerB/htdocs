
<?php
if (isset($_POST)){
    $query="INSERT INTO `usuarios` (`DNI`, `nombre`, `apellidos`, `direccion`, `poblacion`, `correo`) VALUES ('".$_POST['DNI']."', '".$_POST['nombre']."', '".$_POST['apellidos']."', '".$_POST['direccion']."', '".$_POST['poblacion']."', '".$_POST['correo']."')";
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

