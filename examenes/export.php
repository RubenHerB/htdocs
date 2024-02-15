<?php
$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="SELECT * FROM preguntas";
$result = $connection->query($query);
shuffle($result);
for($i=0;$i<10$i++){
    var_dump($result[$i]+"<br>");
}
?>