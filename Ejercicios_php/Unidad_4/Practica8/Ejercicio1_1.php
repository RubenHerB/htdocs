<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero</title>
</head>
<body>
<?php
        session_name("UD4P5E1");
        session_start();
        if($_SESSION==null){
            $_SESSION=["num"=>0];
        }
    ?>
    <h1>Subir y bajar numero</h1>
    Haz clic en los botones para moficar el valor
    <form method="post" action="Ejercicio1_2.php">
        <input type="submit" name="submit" value="-" /><?php echo $_SESSION["num"]; ?> <input type="submit" name="submit" value="+" /><br>
        <input type="submit" name="submit" value="Poner a cero" />
    </form>
    