<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <link rel="stylesheet" href="simon.css">
  <link rel="icon" type="image/png" href="favicon.png">


</head>
<body>
<?php
  session_start();
  if(!isset($_SESSION['user'])) {
      header("Location: index.php");
    }
  ?>
    <h1>SIMÓN</h1>
    <h2>Felicidades <?php echo $_SESSION['user'] ;?>, has acertado</h2>
    <h3 id="temp"></h3>
    <br>
    <div class="dotcenter">
    <?php
    $c=$_SESSION['userc'];
    include("login.php");
    if($_POST==null){
      $log=new login();
    $connection=$log->log();
    $query = 
    "INSERT INTO jugadas (codigousu,acierto)
    VALUES ($c,1)";
    $result = $connection->query($query);
     if (!$result) die("Fatal Error");
     $connection->close(); 
    }
    




    include 'circulos.php';
    $cir=new Circulos();
    $cir->pintar($_SESSION["ran"]);
    
    ?>
    </div>
    <br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="submit" value="Volver a jugar"/>
        <input type="submit" name="submit" value="Salir"/>
    </form>
  <form method="post" class="imp" action="jugadas.php">
    <input type="submit" name="submit" value="Importar/Exportar jugadas" />
  </form>



    <div class="ranking3"id="rankcontent">
<?php
 include 'ranking.php';
if(isset($_POST["submit"])) {
if($_POST["submit"]=="Salir"){
  session_destroy();
  header("Location: index.php");
}else if($_POST["submit"]=="Volver a jugar"){
  $_SESSION=['user'=>$_SESSION["user"],'userc'=>$_SESSION["userc"]];
  header("Location: Inicio.php");
}}
 ?>
 <br>
  </div>
  
    <script type="text/javascript">
      var t=[localStorage.getItem("timer0"),localStorage.getItem("timer1"),localStorage.getItem("timer2")];
      document.getElementById("temp").innerHTML="Tiempo restante: "+("0" + t[0]).slice(-2)+":"+("0" + t[1]).slice(-2)+":"+("0" + t[2]).slice(-2) ;
    </script>

    <button type="button" class="ranks" onclick="var x = document.getElementById('rankcontent');
  if (x.classList.contains('ranking')) {
    x.classList.add('ranking2');
    x.classList.remove('ranking');
  } else if(x.classList.contains('ranking3'))
  {x.classList.remove('ranking3');
    x.classList.add('ranking2');
  }else{
    x.classList.add('ranking');
    x.classList.remove('ranking2');
  }">RANKING</button>
</body>
</html>