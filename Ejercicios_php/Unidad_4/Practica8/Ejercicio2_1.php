<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero</title>
    <style type="text/css">
        .graph{display: flex;}
        .linea{height: 10px;background-color: black;border-radius: -5px;}
        .circulo{height: 10px;width: 10px;background-color: red;border-radius: 5px;position: relative;}
    </style>
</head>
<body>
<?php
        session_name("UD4P5E2");
        session_start();
        if($_SESSION==null){
            $_SESSION=["ancho"=>300];
        }
    ?>
    <h1>Mover un punto de derecha a izquierda</h1>
    Haz clic en los botones para mover el punto:
    <form method="post" action="Ejercicio2_2.php">
        <input type="submit" name="submit" value="<-" /><input type="submit" name="submit" value="->" /><br>
        <div class="graph"><div class="linea" style="width:<?php echo $_SESSION['ancho']; ?>px"></div><div class="circulo"></div><div class="linea" style="width:<?php echo 590-$_SESSION['ancho']; ?>px"></div></div>
        <input type="submit" name="submit" value="volver al centro" />
    </form>
</body>
</html>
    