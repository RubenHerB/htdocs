<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
<head>
    <?php
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    if($_SESSION["carrito"]==null){
        header("Location: inicio.php");
    }
    ?>
</head>