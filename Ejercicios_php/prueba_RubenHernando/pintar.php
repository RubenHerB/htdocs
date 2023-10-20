<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lienzo</title>
  <style>
    .dot {
  display: inline-block;
  margin-left: 1px;
  margin-top: 1px;
}
body{background-color: black;}
  </style>
</head>
<body>
<?php
include ("circulo.php");
switch ($_POST["tipe"]) {
    case "circulo":
        $c=new Circulo($_POST["numero"],$_POST["color"]);
        break;
    case "rectangulo":
        $c=new Rectangulo($_POST["numero"],$_POST["color"]);
        break;
    case "ovalo":
        $c=new Ovalo($_POST["numero"],$_POST["color"]);
        break;
    }
    for($i=0; $i < $_POST["numero"]; $i++) {
    $c->pintar();
    }
?>   
</body>
</html>