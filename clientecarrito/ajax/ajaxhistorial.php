<?php
if (isset($_POST)){
    $query="SELECT * FROM `lineas` as `line` inner join ventas as v on v.codVenta = line.codVenta where v.DNI='".$_POST['dni']."' order by CodLinea desc";
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
$rows=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($rows);
}

