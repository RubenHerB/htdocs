<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero</title>
    <style type="text/css">
        .graph{display: flex;}
        .linea{height: 10px;width: 600px;background-color: black;margin-left: 10px;margin-top: 5px;}
        .circulo{height: 20px;width: 20px;background-color: red;border-radius: 10px;position: absolute;}
    </style>
</head>
<body>
<?php
        session_name("UD4P5E2");
        session_start();
        if($_SESSION==null){
            $_SESSION=["pos"=>300];
        }
        var_dump($_SESSION);
    ?>
    <h1>Mover un punto de derecha a izquierda</h1>
    Haz clic en los botones para mover el punto:
    <form method="post" action="Ejercicio2_2.php">
        <input type="submit" name="submit" value="<-" /><input type="submit" name="submit" value="volver al centro" /><input type="submit" name="submit" value="->" /><br>
        <div class="graph"><div class="linea"></div><div class="circulo" style="margin-left: <?php echo $_SESSION["pos"]; ?>px"></div>
        <br>
        
    </form>
</body>
</html>
    