<?php
$conn = new mysqli('localhost', 'root', '', 'bdsimon');
if ($conn->connect_error) die("Fatal Error");


$query = "SELECT * FROM classics";
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