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


      
?> 
</head>
<body>
    <h1>SIMÓN</h1><br><br>
    <h2>Hola, memoriza los siguientes colores</h2>
    <br>
    <?php
    pintar($_SESSION["adi"]);
    echo"<br><br>";
    var_dump($_SESSION);
    ?>
    <br>
    <form method="post" action="Jugar.php">
        <input style="background-color: red" type="submit" name="ROJO" value="1" />
        <input style="background-color: blue" type="submit" name="AZUL" value="1" />
        <input style="background-color: yellow" type="submit" name="AMARILLO" value="1" />
        <input style="background-color: green" type="submit" name="ROJO" value="1" />
    </form>
</body>
</html>