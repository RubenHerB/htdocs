<?php
var_dump($_POST);
$pregunta=$_POST["pregunta"];
$respuestac=$_POST["respuestac"];
$respuestai1=$_POST["respuestai1"];
$respuestai2=$_POST["respuestai2"];
$respuestai3=$_POST["respuestai3"];

$connection = new mysqli('localhost', "root",, 'examenes');    
if ($connection->connect_error) die("Fatal Error");
$query
$result = $connection->query($query);
?>