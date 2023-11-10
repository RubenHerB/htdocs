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
  margin-bottom: 10px;
  margin-top: 100px;
  
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
    <h1>SIMÓN</h1><br><br>
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
    </script>
</body>
</html>