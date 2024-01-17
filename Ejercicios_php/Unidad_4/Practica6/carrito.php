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

    if(isset($_POST["delete"])){
        unset($_POST["delete"]);
        foreach($_POST as $i=>$n){
            $_SESSION["carrito"][$i]--;
        }
        foreach($_SESSION["carrito"] as $i=>$n){
            if($n==0){
                unset($_SESSION["carrito"][$i]);
            }
        }
    }
if($_SESSION["carrito"]!=null){
    echo <<<_END
    <form method="post" name="delete" action="carrito.php">
<input type="hidden" value="delete" name="delete">
_END;
include("login.php");
$log= new login();
$connection=$log->log_user();

$query = "SELECT * FROM producto";
$result = $connection->query($query);
if (!$result) die("Fatal Error");
$rows = $result->num_rows; 
$t=0;
    foreach ($_SESSION["carrito"] as $i=>$n) {
        $result->data_seek($i);
        $p=$result->fetch_array(MYSQLI_ASSOC);
        echo "<article>
        <img class=\"imge\" src=\"".$p["Image"]."\">
        <div class=\"articlediv\">
        <div class=\"text\">
        <h3>".$p["Name"]."</h3>
        ".$p["Description"]."</div>
        ".$p["Price"]."€ x $n = ".$p["Price"]*$n."€
        <div class=\"btndiv\">
        <input type=\"submit\" name=\"$i\" value=\"Quitar productos\"></div></div></article><hr>";

        $t+=$p["Price"]*$n;
    }
    echo"</form> Precio total: ".$t;
    
    var_dump($_POST);
    var_dump($_SESSION);
    
        echo <<<_END
        <form method="post" action="compra.php">
        <input type="submit" value="Comprar seleccion">
        </form>
    _END;
    }else{
        echo "El carrito de la compra esta vacio";
    }
    ?>
    
    <form method="post" action="inicio.php">
        <input type="submit" value="Volver al catalogo">
    </form>
    </body>
</html>