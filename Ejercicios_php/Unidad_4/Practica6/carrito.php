<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function aumentar(id,i) {
            var n=document.getElementById(id);
            if(n.value<i){
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
    <?php 
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }

    if(isset($_POST["delete"])){
        
        foreach($_POST as $i=>$n){
            if(!is_numeric($i)){
                $dlti=preg_replace("/[^0-9]/", "", $i );
            }
        }
        foreach($_POST as $i=>$n){
            $_SESSION["carrito"][$i]--;
        }
        foreach($_SESSION["carrito"] as $i=>$n){
            if($n==0){
                unset($_SESSION["carrito"][$i]);
            }
        }
    }

    ?>
<form method="post" name="delete" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" value="delete" name="delete">
<?php 
if($_SESSION["carrito"]!=null){
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
        <input type=\"submit\" name=\"submit$i\" value=\"Quitar productos\"></div></div></article>";

        if($i<($rows-1)){
            echo "<hr>";
        }
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