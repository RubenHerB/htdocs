<?php
$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="SELECT * FROM preguntas";
$result = $connection->query($query);
$aleatorio=range(0,($result->num_rows)-1,1);
var_dump($aleatorio);
?>