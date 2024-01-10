<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
            header("Location:login.php");
        }
        ?>
        <h1>Introducir articulos</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Descripcion: <input type="text" name="descripcion"><br>
            Precio: <input type="number" name="precio"><br>
            Caracteristicas: <input type="text" name="caracteristicas"><br>
            <input type="submit" value="Introducir articulo">

        </form>
    </body>
</html>