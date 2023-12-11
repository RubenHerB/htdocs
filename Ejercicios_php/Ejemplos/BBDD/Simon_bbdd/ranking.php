<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

</head>
<body>
    <h1>AGENDA</h1>

    Hola <?php session_start(); echo $_SESSION['usu']."<br>"; 
$log=new login();
$connection=$log->log();
$query = "SELECT 
u.Codigo, u.Nombre, sum(j.acierto) as s
FROM
usuarios u 
LEFT OUTER JOIN 
jugadas j ON u.Codigo=j.codigousu
GROUP BY Codigo
ORDER BY sum(acierto) DESC, codigousu";
$result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 

$result->data_seek(0);
$ms=$result->fetch_assoc()['s'];

 echo "<table><tr><th>Rank</th><th>Codigo</th><th>Nombre</th><th>Aciertos</th><th>Grafica</th></tr>";
 for ($j = 0 ; $j < $rows ; ++$j)
 {
echo '<tr><td>'.($j+1).'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Codigo'].'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Nombre'].'</td>';
 $result->data_seek($j);
 $s=$result->fetch_assoc()['s'];
 if($s==null){$s=0;}
 echo "<td>$s</td><td class= \"grf\"><div style=\"height: 10px;width:".(200*($s/$ms))."px\"></div></td></tr>";
 }
 
 $connection->close(); 
 ?>
</table>
</body>
</html>