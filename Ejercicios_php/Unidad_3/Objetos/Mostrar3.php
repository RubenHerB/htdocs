<?php
include ("Practica4U3_2.php");
$ve_ne=new Vehiculo(1500,"negro");
echo $ve_ne."<br>";
$ve_ne->circula();
$ve_ne->añadir_persona(70);
echo "<br>".$ve_ne."<br>";
?>