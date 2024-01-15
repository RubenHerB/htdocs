<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>
    <body>
    <?php 
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    ?>

    <h1>Hola, <?php echo $_SESSION["name"]; ?></h1>
    </body>
</html>