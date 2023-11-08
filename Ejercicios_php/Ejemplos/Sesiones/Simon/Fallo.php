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
  margin-left: 2%;
  margin-right: 2%;
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

<?php
    function pintar($c){
        $col=["black","red","#4772ff","yellow","green"];
        foreach($c as $p)
        echo "<span class=\"dot\" style=\"background-color:",$col[$p],"\"></span>";
      }
      session_start();
?> 
</head>
<body>
    <script>
        console.log(<?php var_dump($_SESSION); ?>);
    </script>
    <h1>SIMÓN</h1><br><br>
    <h2>Has fallado</h2>
    <br>
    <h4>DEBIAS PINTAR:</h4>
    <?php
    
    pintar($_SESSION["ran"]);
    ?>
    <br>
    <h4>HAS PINTADO:</h4>
    <?php
    pintar($_SESSION["adi"]);
    session_destroy();
    ?>
    <form method="post" action="Inicio.php">
        <input type="submit" value="Volver a jugar?"/>
    </form>
</body>
</html>