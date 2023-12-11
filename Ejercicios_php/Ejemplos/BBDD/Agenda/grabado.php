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
    $connection = new mysqli('localhost', 'root','', 'AGENDA');
    if ($connection->connect_error) die("Fatal Error");
     for($i=1;$i<=$_SESSION['con'];$i++){
        $query = 
    "INSERT INTO `contactos` ( `nombre`, `email`, `telefono`, `codusuario`) VALUES ('".$_POST["nombre$i"]."', '".$_POST["mail$i"]."', '".$_POST["tel$i"]."', '".$_SESSION['cod']."');";
    $result = $connection->query($query);
     if (!$result) die("Fatal Error");
     
     }
     $connection->close(); 
     
     echo "Se han grabado ".$_SESSION['con']." contactos de ".$_SESSION['usu'] ?><br>

    </div>
    <a href="index.php">Volver a logearse</a><br>
    <a href="inicio.php">Introducir mas contactos para <?php echo $_SESSION['usu']?></a><br>
    <a href="totales.php">Total de contactos guardados</a><br>
</body>
</html>