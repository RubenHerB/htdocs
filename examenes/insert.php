<?php
var_dump($_POST);
$pregunta=$_POST["pregunta"];
$respuestac=$_POST["respuestac"];
$respuestai1=$_POST["respuestai1"];
$respuestai2=$_POST["respuestai2"];
$respuestai3=$_POST["respuestai3"];

$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="INSERT INTO preguntas (Pregunta,Respuesta1,Respuesta2,Respuesta3,Respuesta4) VALUES ('$pregunta', '$respuestac', '$resppuestai1', '$resppuestai2', '$respuestai3')";
$result = $connection->query($query);
?>