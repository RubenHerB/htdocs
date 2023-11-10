<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .dot {
    aspect-ratio: 1/1;
  width: 20%;
  border-radius: 50%;
  display: flex;
  margin-bottom: 10px;
  margin-top: 100px;
  
}
.dotcenter {
  display: flex;
  align-content: space-between;
  flex-wrap: wrap;
  width: 100%;
  justify-content: space-around;
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
      include 'circulos.php';
      $cir=new Circulos();
      session_start();
      $ci=[0,0,0,0];
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
    <div class="dotcenter">
    <?php
    $cir.pintar($ci);
    ?>
    </div>
    <br>
    <form method="post" action="Jugar.php">
        <input type="submit" value="VAMOS A JUGAR"/>
    </form>
</body>
</html>