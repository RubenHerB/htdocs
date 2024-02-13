<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
$query = 
"INSERT INTO alumno (Nombre,Apellidos,Mail,Contra,Nacimiento)
VALUES ('oscar','p p','oscar@p.es','".password_hash("oscar",PASSWORD_DEFAULT)."',2002-01-14);";

// $query = 
// "INSERT INTO profesor (Nombre,Apellidos,Mail,Contra,Rol,Departamento)
// VALUES ('jose','a','jose@p.es','".password_hash("jose",PASSWORD_DEFAULT)."',3,'Informatica');";

$result = $connection->query($query);
 if (!$result) die("Fatal Error");


 


?>