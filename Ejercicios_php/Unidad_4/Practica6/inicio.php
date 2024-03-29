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
    <form method="post" action="historial.php">
        <input type="submit" value="Ir al historial de compras">
    </form> 
    
    <h2>Nuestros productos</h2>
    <form method="post" name="add" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" value="add" name="add">
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
        ".$p["Price"]."€
        <div class=\"btndiv\">
        <input type=\"submit\" name=\"$i\" value=\"Añadir productos\">
        </div></article>";
        if($i<($rows-1)){
            echo "<hr>";
        }
    }
    ?>
    </form>
    <br><br>
    <form method="post" action="carrito.php">
        <input type="submit" value="Ir al carrito"> 
    </form>
    <?php
    // var_dump($_POST);
    if(isset($_POST["add"])){
        unset($_POST["add"]);
        foreach($_POST as $i=>$n){
            if(isset($_SESSION["carrito"][$i])){
            $_SESSION["carrito"][$i]++;
            }else{
                $_SESSION["carrito"][$i]=1;
            }
        }
        
    }
    var_dump($_POST);
    var_dump($_SESSION);
    ?>
    </body>
</html>