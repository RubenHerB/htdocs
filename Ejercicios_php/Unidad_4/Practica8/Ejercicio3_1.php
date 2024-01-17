<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero</title>
    <style type="text/css">
        .graph{display: flex;}
        .area{height: 600px;width: 600px;border:1px solid black;margin-left: 10px;margin-top: 10px;}
        .circulo{height: 20px;width: 20px;background-color: red;border-radius: 10px;position: absolute;}
    </style>
</head>
<body>
<?php
        session_name("UD4P5E3");
        session_start();
        if($_SESSION==null){
            $_SESSION=["x"=>300, "y"=>300];
        }
        // var_dump($_SESSION);
    ?>
    <h1>Mover un punto de derecha a izquierda</h1>
    Haz clic en los botones para mover el punto:
    <form method="post" action="Ejercicio3_2.php">
        <input type="submit" name="submit" value="←" />
        <input type="submit" name="submit" value="↑" />
        <input type="submit" name="submit" value="↓" />
        <input type="submit" name="submit" value="→" />
        
        <input type="submit" name="submit" value="volver al centro" /><br>
        <div class="graph"><div class="area"></div><div class="circulo" style="margin-left: <?php echo $_SESSION["x"]; ?>px;margin-top: <?php echo $_SESSION["y"]; ?>px"></div>
        <br>
        
    </form>
</body>
</html>
    