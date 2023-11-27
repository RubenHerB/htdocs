<?php
$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");
$query = "SELECT 
Codigo, Nombre sum(acierto)
FROM
usuarios u 
LEFT OUTER JOIN 
jugadas j ON u.Codigo=j.codigousu
GROUP BY Nombre
ORDER BY sum(acierto) DESC, codigousu";
$result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 
echo $rows;
 
 
 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 echo $result->fetch_assoc()['nombre'];
 echo '<br>';
 }
 ?>