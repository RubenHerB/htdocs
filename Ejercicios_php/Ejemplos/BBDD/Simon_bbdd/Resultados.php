<?php
$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");
$query = "SELECT 
u.Codigo, u.Nombre, sum(j.acierto) as s
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
 
 echo "<table>";
 for ($j = 0 ; $j < $rows ; ++$j)
 {
echo '<tr>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Codigo'].'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Nombre'].'</td>';
 $result->data_seek($j);
 $s=$result->fetch_assoc()['s'];
 echo "<td>$c</td><td>";
 for ($i=0;$i<$s;$i++){
    echo
 }
 echo '</td></tr>';
 }
 echo "</table>";
 ?>