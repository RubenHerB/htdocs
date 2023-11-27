<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
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


table,tr,td,th{border-collapse: collapse;border: 1px solid black;background-color: white;padding: 5px;}
td:not(.grf){text-align: center;
}
.grf div{background-color: blue;}
table{margin: 0 auto 0 auto;}
.ranks {position: fixed; top: 20px;left: 20px;}
  .rankcontent{position: fixed; top: 0;left: 0;height: 40%;width: 40%;border: 1px solid black; background-color: white;overflow: scroll;}
  </style>

<?php
    include 'circulos.php';
    $cir=new Circulos();
      session_start();
      if(isset($_POST["c"])){
        $a=0;
        switch($_POST["c"]){
          case "ROJO":
            $a=1;
            break;
          case "AZUL":
            $a=2;
            break;
          case "AMARILLO":
            $a=3;
            break;
          case "VERDE":
            $a=4;
            break;
          case "COMPROBAR":
            if($_SESSION["adi"]==$_SESSION["ran"]){
            header("Location: Acierto.php");
          }else{
            header("Location: Fallo.php");
          } 
          break;
        }
        if($a!=0){
        $_SESSION["adi"][$_SESSION["count"]]=$a;
        $_SESSION["count"]++;
        }elseif($_POST["c"]!="COMPROBAR"){
        $_SESSION["count"]--;
        $_SESSION["adi"][$_SESSION["count"]]=0;
        }}     
?> 
</head>
<body>

<div class="rankcontent" id="rankcontent" style="display: none;">
  <h1>Rankings</h1>
<?php
$connection = new mysqli('localhost', 'root', '', 'bdsimon');
if ($connection->connect_error) die("Fatal Error");
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
 echo "<td>$s</td><td class= \"grf\"><div style=\"height: 10px;width:".(200*($s/$ms))."px\"></div></td></tr>";
 }
 echo "</table>";
 ?>
 <br>
  </div>




    <h1>SIMÓN</h1>
    <h2>Introduce los colores correctamente</h2>
    <h3 id="temp"></h3>
    <br>
    <div class="dotcenter">
    <?php
    $cir->pintar($_SESSION["adi"]);
    ?>
    </div>
    <br>
    <?php
    $t=true;
    if($_SESSION["count"]<count($_SESSION["adi"])){
      $t=false;
    echo <<<_END
    <form method="post" action="Jugar.php">
        <input onclick="salida()" style="background-color: red" type="submit" name="c" value="ROJO" />
        <input onclick="salida()" style="background-color: #4772ff" type="submit" name="c" value="AZUL" />
        <input onclick="salida()" style="background-color: yellow" type="submit" name="c" value="AMARILLO" />
        <input onclick="salida()" style="background-color: green" type="submit" name="c" value="VERDE" />
        <input onclick="salida()" type="submit" name="c" value="BORRAR" />
    </form>
    _END;
  }else{
      echo <<<_END
        <form method="post" action="Jugar.php">
        <input type="submit" name="c" value="COMPROBAR" />
        </form>
        _END;
    }
    ?>
    <script type="text/javascript">
      var t=[localStorage.getItem("timer0"),localStorage.getItem("timer1"),localStorage.getItem("timer2")];
      document.getElementById("temp").innerHTML="Tiempo restante: "+("0" + t[0]).slice(-2)+":"+("0" + t[1]).slice(-2)+":"+("0" + t[2]).slice(-2) ;
      function r(){  
        t[2]--;
        if(t[0]==0&&t[1]==0&&t[2]==0){
          localStorage.setItem("timer0", 0);
          localStorage.setItem("timer1", 0);
          localStorage.setItem("timer2", 0);
          window.location.href = "Fallo.php";
        }
        if(t[2]<0){
          t[2]=99;
          t[1]--;
          if(t[1]<0){
            t[1]=59;
            t[2]--;
        }}
        
        document.getElementById("temp").innerHTML="Tiempo restante: "+("0" + t[0]).slice(-2)+":"+("0" + t[1]).slice(-2)+":"+("0" + t[2]).slice(-2) ;
    }
    var c=window.some_variable = '<?=$t?>';
    if(!c){
    var timer=setInterval(r,10);}
    function salida(){
      clearInterval(timer);
      localStorage.setItem("timer0", t[0]);
      localStorage.setItem("timer1", t[1]);
      localStorage.setItem("timer2", t[2]);
    }
    </script>
    <button type="button" class="ranks" onclick="var x = document.getElementById('rankcontent');
  if (x.style.display === 'none') {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
  }">RANKING</button> 
</body>
</html>