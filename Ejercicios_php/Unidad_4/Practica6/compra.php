<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
<head>
    <?php
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    if($_SESSION["carrito"]==null){
        header("Location: inicio.php");
    }
    var_dump($_POST);
    ?>
    <h1>Proceso de compra</h1>
    
    <?php 
    if($_POST==null){
        echo "<h2>Se va a proceder a comprar los siguientes productos</h2>";
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
        </div></article>";

        if($i<($rows-1)){
            echo "<hr>";
        }
        $t+=$p["Price"]*$n;
    }
    echo" Precio total: ".$t;
    echo <<<_END
    <form method="post" action="compra.php">
    <input type="submit" name="submit"  value="Confirmar">
    </form>
    <form method="post" action="carrito.php">
    <input type="submit" value="Volver al carrito">
    </form>
    _END;
}else{
    echo"<h2>Compra realizada</h2><br>Puedes ver tus compras en el historial de compras o seguir comprando";
    include("login.php");
    $log= new login();
    $connection=$log->log_user();

    $query = "SELECT IdSell FROM ventas order by IdProductSell desc limit 1";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    $result->data_seek(0);
    $last=$result->fetch_assoc()["IdSell"];
    $last++;
    var_dump($last);
    foreach($_SESSION["carrito"] as $i=>$p){
        $query = "INSERT INTO `ventas` (`IdSell`, `IdBuyer`, `IdProduct`, `Date`, `Number`) VALUES ('$last', '".$_SESSION["IdUser"]."', '$i', NOW(), '$p');";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    }
    $_SESSION["carrito"]=null;
    unset($_POST);
}
    ?>
    
    

</head>