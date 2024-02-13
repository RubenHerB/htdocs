<?php
$id=$_POST["id"];

$query="DELETE FROM incidencias WHERE IdIncidencia LIKE '$id'";
include "../login.php";
    $con=(new login)->log($_SESSION['rolnow']);
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
?>