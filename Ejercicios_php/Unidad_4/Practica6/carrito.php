<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function aumentar(id) {
            var n=document.getElementById(id,n);
            if(n.value<parseInt(n)){
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
    ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 
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
        <button class=\"btn\" type=\"button\" onclick=\"reducir('b$i')\">-</button>
        <input type=\"number\"name=\"$i\" min=\"0\" max=\"$n\" value=\"0\" id=\"b$i\" class=\"numero\">
        <button class=\"btn\" type=\"button\" onclick=\"aumentar('b$i',$n)\">+</button></div></div></article>";
        if($i<($rows-1)){
            echo "<hr>";
        }
        $t+=$p["Price"]*$n;
    }
    ?>
    </form>

    </body>
</html>