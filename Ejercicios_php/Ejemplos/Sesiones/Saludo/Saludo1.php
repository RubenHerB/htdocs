<html>
    <head>
    <title>Saludo</title>
    </head>
    <body>
        <?php
        session_start();
        foreach ($_POST as $key => $val){
            $_SESSION[$key] = $val;
        }
        echo "Bienvenido ",$_SESSION["nom"]," ",$_SESSION["ape"];
        echo'<br>';
        var_dump($_POST);
        echo'<br>';
        var_dump($_SESSION);
        ?>
    <form method="post" action="Saludo2.php">      
    <input type="submit" value="Volver a saludar">
    </form>
    </body>
</html>
   
   