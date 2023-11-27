<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>

  .ranks {position: absolute; top: 20px;left: 20px;}
  .rankcontent{display: none;position: absolute; top: 0;left: 0;height: 40%;width: 40%;border: 1px solid black; background-color: white;overflow: scroll;}

    .dot {
    aspect-ratio: 1/1;
  border-radius: 50%;
  width: 20%;
  margin-right: 2.5%;
  margin-left: 2.5%;
  display: inline-block;
  margin-bottom: 10px;
  margin-top: 20px;
  
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



table,tr,td,th{border-collapse: collapse;border: 1px solid black;background-color: white;padding: 5px;}
td:not(.grf){text-align: center;
}
.grf div{background-color: blue;}
table{margin: 0 auto 0 auto;}


  </style>
</head>
<body>


  <div class="rankcontent" id="rankcontent">
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
    <?php
    session_start();
    if(isset($_POST["nc"])){
      echo "<h2>Hola ",$_SESSION['user'],", memoriza los siguientes colores</h2>";
    }
    ?>
    <h3 id="temp"></h3>
    <form method="post" action="Inicio.php">
      <?php
      if(isset($_POST["submit"])){
      if($_POST["submit"]=="VAMOS A JUGAR"){
      header("Location: Jugar.php");
    }}
      if(isset($_POST["nc"])){
        $numero_circulos = (int)$_POST["nc"];//numero de circulos que habra que acertar en el simon
        
        $ci=[0];
        for ($i=1;$i<$numero_circulos;$i++){
          array_push($ci,0);
        }
        $_SESSION+=["ran"=>$ci,
        "adi"=>$ci,
        "count"=>0];
        for ($i=0;$i<count($ci);$i++){
          $ci[$i]=rand(1,4);
        }
      $_SESSION["ran"]=$ci;
            echo "<div class=\"dotcenter\" id=\"dc\">";
            include 'circulos.php';
            $cir=new Circulos();
            $cir->pintar($ci);
              
        echo "                      
              </div>
              <input type=\"submit\" name=\"submit\" onclick=\"salida()\" value=\"VAMOS A JUGAR\"/>";
      }else{
        echo "<h2>Hola ",$_SESSION['user'],"</h2>";
      echo <<<_END
        Numero de circulos:
        <select name="nc" id="num">
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        </select>
        <br>
        <br>
        <input type="submit" name="submit" value="SELECCIONAR NUMERO DE CIRCULOS"/>
        </form>
        _END;
      }
        ?>
        
    
    <script>
      function rankshow() {
        var x = document.getElementById("rankcontent");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
      }
      var n=parseInt(window.some_variable = '<?=$_POST['nc']?>');
      if (!isNaN(n)){
        t=[0,0,0];
        t[1]=n*4;
        if(t[1]>=60){
          t[0]=Math.trunc(t[1]/60);
          t[1]-=(Math.trunc(t[1]/60)*60);
        }
      }
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
    var timer=setInterval(r,10);
    function salida(){
      clearInterval(timer);
      localStorage.setItem("timer0", t[0]);
      localStorage.setItem("timer1", t[1]);
      localStorage.setItem("timer2", t[2]);
    }
    </script>
    <button class="ranks" onclick="rankshow()">RANKING</button> 
</body>
</html>