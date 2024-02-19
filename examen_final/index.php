<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Iniciar sesion</h1>
    <div style="color:red">
    <?php

if(isset($_POST['login'])){
    $usu=$_POST['user'];
    $pass=$_POST['contra'];
    if($usu!="" && $pass!=""){
include 'login.php';

$query="SELECT nombre, login, clave FROM jugador WHERE login = '$usu' AND clave = '$pass'";
$result= $connection->query($query);
if (!$result) die("Fatal Error");
if($result->num_rows==1){
    session_start();
    $result->data_seek(0);
    $r=$result->fetch_array(MYSQLI_ASSOC);
    $_SESSION=["nombre"=>$r['nombre'], "login"=>$r['login']] ;
    $connection->close();
    header("Location: inicio.php");
}else{
    echo "Credenciales incorrectas";
}
}else{
    echo "Completa todas las casillas para poder logearte";
}
}
        ?></div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name="login" value="login" />
Usuario:
<input type="text" name="user"/><br>
Contraseña:
<input type="password" name="contra"/><br>
<input type="submit" value="Entrar"/>
</form>


</body>
</html>