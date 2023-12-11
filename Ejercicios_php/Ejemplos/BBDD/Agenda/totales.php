<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

</head>
<body>
    <h1>AGENDA</h1>
    <div>
    Hola <?php session_start(); echo $_SESSION['usu']."<br>"; 
$connection = new mysqli('localhost', 'root','', 'AGENDA');
if ($connection->connect_error) die("Fatal Error");
$query = "SELECT 
u.Codigo, u.Nombre, count(c.codcontacto) as co
FROM
usuarios u 
LEFT OUTER JOIN 
contactos c ON u.Codigo=c.codusuario
GROUP BY u.Codigo";
$result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 
 echo "<table><tr><th>Codigo usuario</th><th>Nombre</th><th>Numero de contactos</th><th>Grafica</th></tr>";
 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Codigo'].'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Nombre'].'</td>';
 $result->data_seek($j);
 $s=$result->fetch_assoc()['co'];
 if($s==null){$s=0;}
 echo "<td>$s</td><td style=\"color:red;\">";
 for($i=0;$i<$s;$i++){
    echo "°";
 }
 echo "</td></tr>";
 }
 echo "</table>";
 $connection->close(); 
 ?>