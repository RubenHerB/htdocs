<?php
//----------------------------------------------------------------
include ("Practica4U3_2.php");
$dr=new Dos_ruedas(150,"Rojo");
$dr->añadir_persona(70);
echo "El peso es: ".$dr->getPeso()."<br>";
$dr->setColor("Verde");
$dr->setCilindrada(1000);
var_dump($dr);
$dr->ver_atributo($dr);
echo $dr;
?>