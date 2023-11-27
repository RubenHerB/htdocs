<?php
$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");
$query = 
"SELECT jugadas.codjugada, jugadas.acierto 
FROM jugadas  
INNER JOIN usuarios  
ON jugadas.codigousu = usuarios.Codigo
where usuarios.Nombre = maria";
$result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 

 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 echo "Codigo: ".$result->fetch_assoc()['codjugada'].'<br/>';
 if ($result->fetch_assoc()['acierto']==1){
    $g="Ganada";
 }else{
    $g="Perdida";
 }
 echo "Codigo: $g <br/><br/>";
 }
 ?>