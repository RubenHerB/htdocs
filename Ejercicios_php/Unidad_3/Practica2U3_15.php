<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Practica 15</title>
</head>

<body>
<?php
$nombres=array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");
echo "Numero de elementos:",count($nombres);
?>
<br>
<ul>
<?php
foreach($nombres as $n)
    echo "<li>$n</li>";
?>
</ul>
</body>
</html> 