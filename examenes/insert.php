<?php
var_dump($_POST);
$pregunta=$_POST["pregunta"];
$respuestac=$_POST["respuestacorrecta"];
$respuestai1=$_POST["respuestaincorrecta1"];
$respuestai2=$_POST["respuestaincorrecta2"];
$respuestai3=$_POST["respuestaincorrecta3"];

$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="INSERT INTO preguntas (Pregunta,Respuesta1,Respuesta2,Respuesta3,Respuesta4) VALUES ('$pregunta', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3')";
$result = $connection->query($query);
?>