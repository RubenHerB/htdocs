<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Practica 16</title>
  <style>
    table, td {
  border: 1px solid;border-collapse: collapse;padding: 5px;text-align: center;
}
  </style>
</head>

<body>
<table>
<?php
$lenguajes_cliente=array("Cliente 1"=>"React",
                            "Cliente 2"=>"Javascript",
                            "Cliente 3"=>"Angular");
$lenguajes_servidor=array("Servidor 1"=>"Perl",
                            "Servidor 2"=>"Php",
                            "Servidor 3"=>"Python");
$lenguajes=array_merge($lenguajes_cliente,$lenguajes_servidor);
foreach($lenguajes as $in=>$con){
    echo "<tr><td>$in</td><td>$con</td></tr>";
}

?>
</table>
</body>
</html> 