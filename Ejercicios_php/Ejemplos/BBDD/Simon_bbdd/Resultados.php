<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .dot {
    aspect-ratio: 1/1;
    width: 20%;
  margin-right: 2.5%;
  margin-left: 2.5%;
  border-radius: 50%;
  display: inline-block;
  margin-bottom: 10px;
  margin-top: 20px;
  
}
.dotcenter {align-content: space-between;}

form{
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}
input[type="submit"] {
  padding: 10px;
  border-radius: 10px;
}
input[type="submit"]:hover{
    box-shadow: 0px 5px 10px black;
    transform: translateY(5px);
}
body{background-color: aquamarine;text-align: center;}
table,tr,td,th{border-collapse: collapse;border: 1px solid black;background-color: white;padding: 5px;}
td:not(.grf){text-align: center;
}
span{background-color: blue;}
table{margin: 0 auto 0 auto;}

  </style>


</head>
<body>

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

$result->data_seek(0);
$ms=$s=$result->fetch_assoc()['s'];

 echo "<table><tr><th>Codigo</th><th>Nombre</th><th>Aciertos</th><th>Grafica</th></tr>";
 for ($j = 0 ; $j < $rows ; ++$j)
 {
echo '<tr>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Codigo'].'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Nombre'].'</td>';
 $result->data_seek($j);
 $s=$result->fetch_assoc()['s'];
 echo "<td>$s</td><td class= \"grf\">";
 for ($i=0;$i<$s;$i++){
    echo "<span style=\"height: 1em;width:".(10*($s/$ms))."em></span>";
 }
 echo '</td></tr>';
 }
 echo "</table>";
 ?>

</body>
</html>