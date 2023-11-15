<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sesiones</title>
</head>
<body>
    Los datos introducidos son los siguientes: <br><br>
    Usuario: 
    <?php
      session_start();
      echo $_SESSION['u'];
    ?>
    <br><br>
    Contraseña: 
    <?php
      echo $_SESSION['p'];
    ?>
    <br><br>
    ¿Son correctos?
    <br><br>
    <a href="login.php">Si</a>
    <br><br>
    <a href="index.php">No</a>
    
</body>
</html>