<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>
</head>
<body>
    <h1>AGENDA</h1>
    <h2>Hola <?php session_start(); echo $_SESSION['usu']; ?></h2>
    <form method="post" action="grabado.php">
    <?php 
    for($i=1; $i<=$_SESSION['con'];$i++){
        echo <<<_END
            <div>
            <h3>Contacto $i</h3>
            Nombre $i: <input type="text" name="nombre$i" required><br />
            Email $i: <input type="text" name="mail$i" required><br />
            Teléfono $i: <input type="text" name="tel$i" required><br />
            </div>
        _END;
    }
    ?>
    <input type="submit" name="grabar" value="grabar">
    </form>
</body>
</html>