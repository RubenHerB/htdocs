<?php
$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");
$query = "SELECT usuarios.Codigo, usuarios.Nombre FROM usuarios";
$result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 
echo $rows;
 
 
 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 var_dump($result->fetch_assoc(MYSQLI_ASSOC));
 echo '<br>';
 }
 ?>