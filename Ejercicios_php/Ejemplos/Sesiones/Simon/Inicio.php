<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .dot {
    aspect-ratio: 1/1;
  border-radius: 50%;
  display: inline-block;
  margin-bottom: 10px;
  margin-top: 100px;
  
}

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
  </style>

<?php
      const numero_circulos = 20;//numero de circulos que habra que acertar en el simon
      include 'circulos.php';
      $cir=new Circulos();
      session_start();
      $ci=[0];
      for ($i=1;$i<numero_circulos;$i++){
        array_push($ci,0);
      }
      $_SESSION=["ran"=>$ci,
      "adi"=>$ci,
      "count"=>0];
      for ($i=0;$i<count($ci);$i++){
        $ci[$i]=rand(1,4);
      }
    $_SESSION["ran"]=$ci;
?> 
</head>
<body>
    <h1>SIMÓN</h1><br><br>
    <h2>Hola, memoriza los siguientes colores</h2>
    <br>
    <div class="dotcenter" id="dc">
    <?php
    $cir->pintar($ci);
    ?>
    </div>
    <br>
    <form method="post" action="Jugar.php">
        <input type="submit" value="VAMOS A JUGAR"/>
    </form>
</body>
</html>