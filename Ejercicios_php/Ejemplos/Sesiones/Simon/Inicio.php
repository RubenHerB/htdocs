<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simon</title>
  <style>
    .dot {
    aspect-ratio: 1/1;
  border-radius: 50%;
  display: inline-block;
  margin-bottom: 10px;
  margin-top: 100px;
  
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
  </style>
</head>
<body>
    <h1>SIMÓN</h1><br><br>
    <h2>Hola, memoriza los siguientes colores</h2>
    <h3 id="temp"></h3>
    <form method="post" action="Inicio.php">
      <?php
      if($_POST["submit"]=="VAMOS A JUGAR"){
         
        $numero_circulos = 20;//numero de circulos que habra que acertar en el simon
        session_start();
        $ci=[0];
        for ($i=1;$i<$numero_circulos;$i++){
          array_push($ci,0);
        }
        $_SESSION=["ran"=>$ci,
        "adi"=>$ci,
        "count"=>0];
        for ($i=0;$i<count($ci);$i++){
          $ci[$i]=rand(1,4);
        }
      $_SESSION["ran"]=$ci;
      header("Location: Jugar.php");
    }
      if(isset($_POST["nc"])){
            echo "<div class=\"dotcenter\" id=\"dc\">";
            include 'circulos.php';
            $cir=new Circulos();
            $cir->pintar($ci);
              
        echo "                      
              </div>
              <input type=\"submit\" value=\"VAMOS A JUGAR\"/>";
      }else{
      echo <<<_END
        <select name="nc">
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
        <input type="Submit"  value="SELECCIONAR NUMERO DE CIRCULOS"/>>
        _END;
      }
        ?>
        
    </form>
    
</body>
</html>