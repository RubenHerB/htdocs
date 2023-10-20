<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Practica 21</title>
  <style>
    table{float: left;}
    table, td {
  border: 1px solid;border-collapse: collapse;padding: 10px;text-align: center;
}
  </style>
</head>

<body>
<table>
<caption>Tabla sin ordenar</caption>
<?php
$numeros=array("a"=>3,"b"=>2,"c"=>8,"d"=>123,"e"=>5,"f"=>1);
foreach($numeros as $in=>$con){
    echo "<tr><td>$in</td><td>$con</td></tr>";
}

?>
</table>
<table style="margin-left: 10px;">
<caption>Tabla ordenada</caption>
<?php
asort($numeros);
foreach($numeros as $in=>$con){
    echo "<tr><td>$in</td><td>$con</td></tr>";
}

?>
</table>
</body>
</html> 