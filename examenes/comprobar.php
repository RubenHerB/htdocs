<?php
$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="SELECT Respuesta1 FROM preguntas where IdPregunta like ".$_POST["id"]." LIMIT 1";
$result = $connection->query($query);
foreach ($result as $row){
echo (String) $row["Respuesta1"];
}
?>