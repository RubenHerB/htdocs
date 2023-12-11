<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

</head>
<body>
    <h1>AGENDA</h1>
    <div>
    Hola <?php session_start(); echo $_SESSION['usu']."<br>"; 
     for($i=1;$i<=$_SESSION['con'];$i++){
        
     }
     
     
     echo "Se han grabado ".$_SESSION['con']." contactos de ".$_SESSION['usu'] ?><br>

    </div>
</body>
</html>