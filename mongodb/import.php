<?php
require("vendor/autoload.php");

$client = new MongoDB\Client('mongodb+srv://rubenhb:1234@rubenhb.81s2ki2.mongodb.net/?retryWrites=true&w=majority');
$db = $client->empresa;
$coll = $db->selectCollection("empleados");


$connection = new mysqli('localhost', 'root', '', 'empresa');
if ($connection->connect_error) die("Fatal Error");
$query ="SELECT * FROM empleados";
$result = $connection->query($query);
if (!$result) die("Fatal Error");
$rows = $result->num_rows; 

for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
$r=$result->fetch_array(MYSQLI_ASSOC);
$coll->insertOne([
    "CodEmple"=>$r["CodEmple"],
    "Nombre"=>$r["Nombre"],
    "Apellido1"=>$r["Apellido1"],
    "Apellido2"=>$r["Apellido2"],
    "Departamento"=>$r["Departamento"]
]);
}
?>