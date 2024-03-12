<?php
if (isset($_POST)){
    $query="UPDATE `usuarios` SET `nombre`='"$_POST['nombre']"',`apellidos`='[value-3]',`direccion`='[value-4]',`poblacion`='[value-5]',`correo`='[value-6]' WHERE 1
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

