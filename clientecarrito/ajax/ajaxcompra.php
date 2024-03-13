<?php
if (isset($_POST)){
    $query="INSERT INTO `ventas` ( `fecha`, `DNI`) VALUES ('".date('Y-m-d')."', '".$_POST['dni']."')";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
$query = "SELECT codVenta FROM ventas order by codVenta desc limit 1";
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
foreach ($result as $row){
    $n=$row['codVenta'];
}
$carrito=$_POST;
unset($carrito['dni']);
 
foreach ($carrito as $key=>$row){
    if ($row['codVenta']
}

