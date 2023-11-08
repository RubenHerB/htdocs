<html>
    <head>
    <title>Saludo</title>
    </head>
    <body>
        <?php
        session_start();
        echo'<br>';
        var_dump($_POST);
        echo'<br>';
        var_dump($_SESSION);
        echo "Bienvenido de nuevo ",$_SESSION["nom"]," ",$_SESSION["ape"];
        session_destroy();
        ?>
    <form method="post" action="Saludo3.php">      
    <input type="submit" value="Destruir sesion">
    </form>
    </body>
</html>
   
    