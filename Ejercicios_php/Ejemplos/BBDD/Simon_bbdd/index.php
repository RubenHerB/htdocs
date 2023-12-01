<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
    include("login.php");
    $log=new login();
    $connection=$log->log();
    
    
    $query = "SELECT Codigo, Nombre ,Clave FROM usuarios WHERE Nombre like $username";
     $result = $connection->query($query);
     if (!$result) die("Fatal Error");
     $rows = $result->num_rows; 
    $l=false;
    $c=0;




    for ($j=0; $j<$rows ; $j++){
      $result->data_seek($j); 
      $row = $result->fetch_array(MYSQLI_ASSOC);
   if ($row['Nombre']===$username && password_verify($password, $row['Clave']) ){
    $l=true;
    $c=$row['Codigo'];
   }}
    

   if($l){
    session_start();
$_SESSION=['user'=>$username,'userc'=>$c];
    header("Location: Inicio.php");
} else {
$error="Usuario o contraeña incorrectas";
}

 }
?>

    <h2>Iniciar sesión</h2>
    <div class="log-container">
    <?php echo $error.'<br>'; ?>
    <form class="log" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>
    O
    <form  action="register.php" method="post">
    <input type="submit" value="Registrarse">
    </form>
    </div>
</body>
</html>