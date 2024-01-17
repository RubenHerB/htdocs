<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero</title>
    <style type="text/css">
        .a{height: 10px; background-color: lightblue;}
        .b{height: 10px; background-color: lightsalmon;}
    </style>
</head>
<body>
<?php
        session_name("UD4P5E4");
        session_start();
        if($_SESSION==null){
            $_SESSION=["a"=>0, "b"=>0];
        }
        var_dump($_SESSION);
    ?>
    <h1>Votar una opcion</h1>
    Haz clic en los botones para votar por una opcion:
    <form method="post" action="Ejercicio4_2.php">
        <input type="submit" name="submit" value="a"/><div class="a" style="width: <?php echo $_SESSION["a"]; ?>px"></div><br>
        <input type="submit" name="submit" value="b"/><div class="b" style="width: <?php echo $_SESSION["b"]; ?>px"></div><br>
        <input type="submit" name="submit" value="poner a cero" /><br>
        
    </form>
</body>
</html>