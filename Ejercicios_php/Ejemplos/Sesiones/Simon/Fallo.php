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
.parpadea {
  color: red;
  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
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
    <h1>SIMÓN</h1><br><br>
    <h2>Has fallado</h2>
    <h3 id="temp"></h3>
    <br>
    <h4>DEBIAS PINTAR:</h4>
    <div class="dotcenter">
    <?php
    session_start();
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
    session_destroy();
    ?>
    </div>
    <form method="post" action="Inicio.php">
        <input type="submit" value="Volver a jugar?"/>
    </form>
    <script type="text/javascript">
      var t=[localStorage.getItem("timer0"),localStorage.getItem("timer1"),localStorage.getItem("timer2")];
      if(t[0]==0&&t[1]==0&&t[2]==0){
        document.getElementById("temp").innerHTML="Te has quedado sin tiempo";
        document.getElementById("temp").classList.add("parpadea")
      }else{
      document.getElementById("temp").innerHTML="Tiempo restante: "+("0" + t[0]).slice(-2)+":"+("0" + t[1]).slice(-2)+":"+("0" + t[2]).slice(-2) ;
      }
    </script>
</body>
</html>