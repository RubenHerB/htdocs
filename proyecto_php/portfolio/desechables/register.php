<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
// $query = 
// "INSERT INTO alumno (Nombre,Apellidos,Mail,Contra,Nacimiento)
// VALUES ('luis','p p','luis@p.es','".password_hash("luis",PASSWORD_DEFAULT)."',2002-01-14);"
// ;

$query = 
"INSERT INTO profesor (Nombre,Apellidos,Mail,Contra,Rol)
VALUES ('ana','a','ana@p.es','".password_hash("ana",PASSWORD_DEFAULT)."',1);"
;

$result = $connection->query($query);
 if (!$result) die("Fatal Error");


 


?>