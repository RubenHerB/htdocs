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
form{
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}
input[type="submit"] {
  padding: 10px;
  border-radius: 10px;
}
body{background-color: aquamarine;}
  </style>

<?php
    function pintar($c){
        $col=["black","red","#4772ff","yellow","green"];
        foreach($c as $p)
        echo "<span class=\"dot\" style=\"background-color:",$col[$p],"\"></span>";
      }
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
        }
        $c=$_SESSION["count"];
        if($a!=0){
        $_SESSION["adi"][$c]=$a;
        }
        $_SESSION["count"]++;
      }
      
?> 
</head>
<body>
    <h1>SIMÓN</h1><br><br>
    <h2>Introduce los colores correctamente</h2>
    <br>
    <?php
    pintar($_SESSION["adi"]);
    ?>
    <br>
    <?php
    if($_SESSION["count"]<count($_SESSION["adi"])){
    echo <<<_END
    <form method="post" action="Jugar.php">
        <input style="background-color: red" type="submit" name="c" value="ROJO" />
        <input style="background-color: #4772ff" type="submit" name="c" value="AZUL" />
        <input style="background-color: yellow" type="submit" name="c" value="AMARILLO" />
        <input style="background-color: green" type="submit" name="c" value="VERDE" />
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
</body>
</html>