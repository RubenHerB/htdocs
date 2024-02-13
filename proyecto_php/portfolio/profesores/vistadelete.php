<?php
session_start();
$id=$_POST["id"];

$query="DELETE FROM incidencias WHERE IdIncidencia='$id'";
var_dump($query);
include "../login.php";
    $con=(new login)->log($_SESSION['rolnow']);
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
?>