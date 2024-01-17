<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        article{width: 30%;border: 1px splid black;border-radius: 20px; padding: 5px; margin: 5px;}
    </style>
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

$query = "SELECT IdSell FROM ventas WHERE IdBuyer like ".$_SESSION["IdUser"]." group by IdSell ORDER by IdSell desc";
$result = $connection->query($query);
if (!$result) die("Fatal Error");
$rows = $result->num_rows; 
if($rows>0){
for ($i=0;$i<$rows;$i++){
    $result->data_seek($i);
    $id= $result->fetch_assoc()["IdSell"];
    $queryaux="SELECT v.Date,v.Number,p.Name,p.Price,p.Image FROM ventas v inner join productos p WHERE v.IdSell like $id and v.IdProduct like p.IdProduct";
    $resultaux = $connection->query($queryaux);
    if (!$resultaux) die("Fatal Error");
    $rowsaux = $resultaux->num_rows; 
    $resultaux->data_seek(0);
    echo "<article> Fecha: ".$resultaux->fetch_assoc()["v.Date"]."<br>";
    for ($j=0;$j<$rowsaux;$j++){
        $resultaux->data_seek(0);
        $p=$resultaux->fetch_array(MYSQLI_ASSOC);
        var_dump($p);
        echo '<br';
    }
    echo "</article><hr>";
}
}else{
    echo "No se ha realizado ninguna compra";
}
    
    ?>
    </body>
</html>