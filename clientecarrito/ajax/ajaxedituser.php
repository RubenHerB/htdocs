<?php
if (isset($_POST)){
    $query="UPDATE `usuarios` SET `nombre`='".$_POST['nombre']."',`apellidos`='".$_POST['apellidos']."',`direccion`='".$_POST['direccion']."',`poblacion`='".$_POST['poblacion']."',`correo`='".$_POST['correo']."' WHERE DNI = '".$_POST['DNI']."'";
    ";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
}

