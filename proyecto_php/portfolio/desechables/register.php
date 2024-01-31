<?php 
$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");
$query = 
"INSERT INTO usuarios (Codigo,Nombre,Clave,Rol)
VALUES (5,'luis','luis',0);"
;
$result = $connection->query($query);
 if (!$result) die("Fatal Error");


 


?>