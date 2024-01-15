<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="estilos.css">
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
    $log= new login();
    $connection=$log->log_login();
    
    $query = "SELECT * FROM usuarios WHERE User like '$username'";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
      $rows = $result->num_rows; 
      $l=false;
      $c=0;
      if($rows>0){
        $result->data_seek(0); 
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if(password_verify($password, $row['Pass'])){
          $l=true;
          $c=$row["IdUser"];
          $ad=$row['Role']==1? true:false;
          $name=$row["Name"];
        }
    }    

    if($l){
    session_start();
    $_SESSION=['name'=>$name,'IdUser'=>$c,'admin'=>$ad,'carrito'=>""];
    if($ad){
    header("Location: admin.php");
    }else{
    header("Location: Inicio.php");
    }
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