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
        $col=["black","red","#4772ff","yellow","green"];
        foreach($c as $p)
        echo "<span class=\"dot\" style=\"background-color:",$col[$p],"\"></span>";
      }
?> 
</head>
<body>
    <h1>SIMÓN</h1><br><br>
    <h2>Felicidades, has acertado</h2>
    <br>
    <?php
    session_start();
    pintar($_SESSION["ran"]);
    echo"<br><br>";
    var_dump($_SESSION);
    session_destroy();
    ?>
    <br>
    <form method="post" action="Inicio.php">
        <input type="submit" value="Volver a jugar?"/>
    </form>
</body>
</html>