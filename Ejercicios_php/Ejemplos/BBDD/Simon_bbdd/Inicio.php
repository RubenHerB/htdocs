<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <link rel="stylesheet" href="simon.css">
  <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
    <h1>SIMÓN</h1>
    <?php
    include("login.php");
    session_start();
    var_dump($_SESSION);
    if(!isset($_SESSION['user'])) {
        header("Location: index.php");
      }
    
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
        $numero_circulos = (int)$_POST["nc"];
        
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
        if($_SESSION["admin"]){
          echo <<<_END
          <div class="fichero">
        <form method="post"  action="jugadas.php">
        <input type="submit" name="submit" value="Importar/Exportar jugadas" />
        </form>
        </div>
        _END;
        }
      }
        ?>
        
  <div class="ranking3" id="rankcontent">
  <?php include 'ranking.php';?>
 <br>
  </div>
  
    <script>

      var n=parseInt(window.some_variable = '<?=$_POST['nc']?>');
      if (!isNaN(n)){
        t=[0,0,0];
        t[1]=Math.ceil((n*1.5)+Math.pow(1.25,(n+1)));
        if(t[1]>=60){
          t[0]=Math.trunc(t[1]/60);
          t[1]-=(Math.trunc(t[1]/60)*60);
        }}
        
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