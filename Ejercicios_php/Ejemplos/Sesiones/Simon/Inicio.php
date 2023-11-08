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
  display: inline-block;
  margin-left: 4%;
  margin-top: 100px;
  
}
body{background-color: aquamarine;}
  </style>

<?php
    function pintar($c){
        $col=["black","red","blue","yellow","green"];
        foreach($c as $p)
        echo "<span class=\"dot\" style=\"background-color:",$col[$p],"\"></span>";
      }
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
    <?php
    pintar($ci);
    echo"<br><br>";
    var_dump($_SESSION);
    ?>
    <form method="post" action="Jugar.php">
        <input type="submit" value="VAMOS A JUGAR"/>
    </form>
</body>
</html>