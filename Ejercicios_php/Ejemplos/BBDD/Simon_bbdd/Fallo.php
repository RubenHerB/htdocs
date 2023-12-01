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
    <h2><?php echo $_SESSION['user'] ;?>, has fallado</h2>
    <h3 id="temp"></h3>
    <br>
    <h4>DEBIAS PINTAR:</h4>
    <div class="dotcenter">
    <?php
    $c=$_SESSION['userc'];
    $connection = new mysqli('localhost', 'user','user', 'bdsimon');
    if ($connection->connect_error) die("Fatal Error");
    $query = 
    "INSERT INTO jugadas (codigousu,acierto)
    VALUES ($c,0)";
    $result = $connection->query($query);
     if (!$result) die("Fatal Error");




    include 'circulos.php';
      $cir=new Circulos();
    $cir->pintar($_SESSION["ran"]);
    ?>
    </div>
    <br>
    <h4>HAS PINTADO:</h4>
    <div class="dotcenter">
    <?php
    $cir->pintar($_SESSION["adi"]);
    $connection->close(); 
    ?>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="submit" value="Volver a jugar"/>
        <input type="submit" name="submit" value="Salir"/>
    </form>



    <div class="ranking3"id="rankcontent">
  <h1>Ranking</h1>
<?php
var_dump($_POST);
if($_POST["submit"]=="Salir"){
  session_destroy();
  header("Location: index.php");
}else if($_POST["submit"]=="Volver a jugar"){
  $_SESSION=['user'=>$_SESSION["user"],'userc'=>$_SESSION["userc"]];
  header("Location: Inicio.php");
}

include("login.php");
$log=new login();
$connection=$log->log();
$query = "SELECT 
u.Codigo, u.Nombre, sum(j.acierto) as s
FROM
usuarios u 
LEFT OUTER JOIN 
jugadas j ON u.Codigo=j.codigousu
GROUP BY Nombre
ORDER BY sum(acierto) DESC, codigousu";
$result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows; 

$result->data_seek(0);
$ms=$s=$result->fetch_assoc()['s'];

 echo "<table><tr><th>Rank</th><th>Codigo</th><th>Nombre</th><th>Aciertos</th><th>Grafica</th></tr>";
 for ($j = 0 ; $j < $rows ; ++$j)
 {
echo '<tr><td>'.($j+1).'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Codigo'].'</td>';
 $result->data_seek($j);
 echo '<td>'.$result->fetch_assoc()['Nombre'].'</td>';
 $result->data_seek($j);
 $s=$result->fetch_assoc()['s'];
 if($s==null){$s=0;}
 echo "<td>$s</td><td class= \"grf\"><div style=\"height: 10px;width:".(200*($s/$ms))."px\"></div></td></tr>";
 }
 echo "</table>";
 ?>
 <br>
  </div>
  
    <script type="text/javascript">
      var t=[localStorage.getItem("timer0"),localStorage.getItem("timer1"),localStorage.getItem("timer2")];
      if(t[0]==0&&t[1]==0&&t[2]==0){
        document.getElementById("temp").innerHTML="Te has quedado sin tiempo";
        document.getElementById("temp").classList.add("parpadea")
      }else{
      document.getElementById("temp").innerHTML="Tiempo restante: "+("0" + t[0]).slice(-2)+":"+("0" + t[1]).slice(-2)+":"+("0" + t[2]).slice(-2) ;
      }
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