<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>
    <body>
        <h1>Historial</h1>
    <?php
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }

    include("login.php");
$log= new login();
$connection=$log->log_user();

$query = "SELECT IdSell FROM ventas WHERE IdBuyer like ".$_SESSION["IdUser"]." group by IdSell ORDER desc";
$result = $connection->query($query);
if (!$result) die("Fatal Error");
$rows = $result->num_rows; 
if($rows>0){
for ($i=0;$i<$rows;$i++){
    
}
}else{
    echo "No se ha realizado ninguna compra";
}
    
    ?>
    </body>
</html>