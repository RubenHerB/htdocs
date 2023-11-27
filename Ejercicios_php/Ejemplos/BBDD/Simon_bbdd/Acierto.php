<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .ranks {position: absolute; top: 0;}
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
  </style>


</head>
<body>
    <h1>SIMÓN</h1>
    <h2>Felicidades, has acertado</h2>
    <h3 id="temp"></h3>
    <br>
    <div class="dotcenter">
    <?php
    session_start();
    $c=$_SESSION['userc'];
    $connection = new mysqli('localhost', 'root','', 'bdsimon');
    if ($connection->connect_error) die("Fatal Error");
    $query = 
    "INSERT INTO jugadas (codigousu,acierto)
    VALUES ($c,1)";
    $result = $connection->query($query);
     if (!$result) die("Fatal Error");




    include 'circulos.php';
    $cir=new Circulos();
    $cir->pintar($_SESSION["ran"]);
    session_destroy();
    $connection->close(); 
    ?>
    </div>
    <br>
    <form method="post" action="Autenticacion.php">
        <input type="submit" value="Volver a jugar?"/>
    </form>
    <form class="ranks" method="post" action=Resultados.php >
    <input type="submit" name="submit" value="RANKING"/>
    </form>
    <script type="text/javascript">
      var t=[localStorage.getItem("timer0"),localStorage.getItem("timer1"),localStorage.getItem("timer2")];
      document.getElementById("temp").innerHTML="Tiempo restante: "+("0" + t[0]).slice(-2)+":"+("0" + t[1]).slice(-2)+":"+("0" + t[2]).slice(-2) ;
    </script>
</body>
</html>