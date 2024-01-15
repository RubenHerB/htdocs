<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function aumentar(id) {
            var n=document.getElementById(id);
            if(n.value<99){
                n.value++;
            }
        }

        function reducir(id) {
            var n=document.getElementById(id);
            if(n.value>0){
                n.value--;
            }
        }
    </script>
</head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php 
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    ?>

    <h1>Hola, <?php echo $_SESSION["name"]; ?></h1>
    
    <h2>Nuestros productos</h2>
    <?php
        include("login.php");
        $log= new login();
        $connection=$log->log_user();

    $query = "SELECT * FROM producto";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    $rows = $result->num_rows; 

    for ($i=0;$i<$rows;$i++){
        $result->data_seek($i);
        $p=$result->fetch_array(MYSQLI_ASSOC);
        echo "<article>
        <img class=\"imge\" src=\"".$p["Image"]."\">
        <div class=\"articlediv\">
        <div class=\"text\">
        <h3>".$p["Name"]."</h3>
        ".$p["Description"]."</div>
        <div class=\"btndiv\">
        <button class=\"btn\" type=\"button\" onclick=\"reducir('b$i')\">-</button>
        <input type=\"number\" min=\"0\" max=\"99\" value=\"0\" id=\"b$i\" class=\"numero\">
        <button class=\"btn\" type=\"button\" onclick=\"aumentar('b$i')\">+</button></div></div></article>";
        if($i<($rows-1)){
            echo "<hr>";
        }
    }
    ?>
    <br><br>
    <input type="submit" value="Añadir al carrito" class="add">
    </form>
    <br><br>
    <form method="post" action="carrito.php">
        <input type="submit" value="Ir al carrito"> 
    </form>
    </body>
</html>