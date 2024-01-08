<h1>Ranking</h1>
<?php
include_once("login.php");
$logr=new login();
session_start();
$connectionr=$logr->log_rank();
$queryr = "SELECT 
u.Codigo, u.Nombre, sum(j.acierto) as s
FROM
usuarios u 
LEFT OUTER JOIN 
jugadas j ON u.Codigo=j.codigousu
GROUP BY Codigo
ORDER BY sum(acierto) DESC, codigousu";
$resultr = $connectionr->query($queryr);
 if (!$resultr) die("Fatal Error");
 $rowsr = $resultr->num_rows; 

$resultr->data_seek(0);
$msr=$resultr->fetch_assoc()['s'];

 echo "<table><tr><th>Rank</th><th>Codigo</th><th>Nombre</th><th>Aciertos</th><th>Grafica</th></tr>";
 for ($j = 0 ; $j < $rowsr ; ++$j)
 {
echo '<tr><td>'.($j+1).'</td>';
 $resultr->data_seek($j);
 echo '<td>'.$resultr->fetch_assoc()['Codigo'].'</td>';
 $resultr->data_seek($j);
 echo '<td>'.$resultr->fetch_assoc()['Nombre'].'</td>';
 $resultr->data_seek($j);
 $s=$resultr->fetch_assoc()['s'];
 if($s==null){$s=0;}
 echo "<td>$s</td><td class= \"grf\"><div style=\"height: 10px;width:".(200*($s/$msr))."px\"></div></td></tr>";
 }
 echo "</table>";
 $connectionr->close(); 
 ?>