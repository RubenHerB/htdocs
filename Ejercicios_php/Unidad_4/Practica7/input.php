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
            Descripcion: <input type="text" name="descripcion" required><br>
            Precio: <input type="number" name="precio" required><br>
            Caracteristicas: <input type="text" name="caracteristicas"><br>
            <input type="submit" value="Introducir articulo">
        </form>
        <?php
        if(isset($_POST)){
            $connection = new mysqli('localhost', 'administrador','administrador', 'ventas');
            $query = "INSERT INTO articulos (descripcion,precio,caracteristicas) VALUES ('".$_POST["descripcion"]."',".$_POST["precio"].",'".$_POST["caracteristicas"]."')";
            $result = $connection->query($query);
            if (!$result){
                die("Fatal Error");
            }else{
                echo "<br>El articulo se ha registrado exitosamente";
            }
        }
        ?>
    </body>
</html>