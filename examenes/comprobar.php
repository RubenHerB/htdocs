<?php
$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="SELECT Respuesta1 FROM preguntas where IdPregunta like ".$_POST["id"];
$result = $connection->query($query);
$result->data_seek(0);
echo $result->fetch_assoc()['Respuesta1'];
?>