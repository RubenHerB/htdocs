<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="simon.css">
    <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
  <?php
  $username="";
  $error="";
// Verificar si se han enviado datos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST) && isset($_POST["username"])) {
    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordcheck = $_POST["passwordcheck"];
    
    include("login.php");
    $log=new login();
    $connection=$log->log();
    
    
    $query = "SELECT Nombre FROM usuarios where Nombre LIKE '$username'";
     $result = $connection->query($query);
     if (!$result) die("Fatal Error");
     $rows = $result->num_rows;  
   
    
   if($rows>0){
    $error="Este nombre de usuario ya existe";
   }else{
    if($password===$passwordcheck){
        $query = "SELECT Codigo FROM usuarios order by Codigo DESC limit 1";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
        $result->data_seek(0); 
        $lastid = $result->fetch_array()['Codigo'];        
        $queryi = "INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`) VALUES ('".($lastid+1)."','".$username."','".password_hash($password, PASSWORD_DEFAULT)."', '0');";
     $resulti = $connection->query($queryi);
     if (!$resulti) {
        die("Fatal Error");
    }else{
        header("Location: index.php");
    }
    }else{
        $error="La contraseña y la confirmacion de contraseña deben ser iguales";
    }
   }}
?>

    <h2>Registrarse</h2>
    <div class="log-container">
    <?php echo $error.'<br>'; ?>
    <form class="log" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="password">Repetir ontraseña:</label>
        <input type="password" id="passwordcheck" name="passwordcheck" required><br><br>

        <input type="submit" value="Registrarse">
    </form>
    O
    <form  action="index.php" method="post">
    <input type="submit" value="Iniciar Sesion">
    </form>
    </div>
</body>
</html>