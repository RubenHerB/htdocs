<?php
//----------------------------------------------------------------
include ("Practica4U3_2.php");
$co=new Coche(2100,"verde",4);
$co->añadir_cadenas_nieve(2);
$co->añadir_persona(80);
$co->setColor("azul");
$co->quitar_cadenas_nieve(4);
$co->setColor("negro");
$co::ver_atributo($co);
?>