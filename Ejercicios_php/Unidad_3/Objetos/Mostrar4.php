<?php
//----------------------------------------------------------------
include ("Practica4U3_2.php");
$dr=new Dos_ruedas(150,"Rojo");
$dr->añadir_persona(70);
echo "El peso es: ".$dr->getPeso()."<br>";
$dr->setColor("Verde");
$dr->setCilindrada(1000);
$dr::ver_atributo($dr);
$ca=new Camion(6000,"Blanco",0);
$ca->setColor("Azul");
$ca->añadir_persona(84);
$ca->setNumero_puertas(2);
$ca::ver_atributo($ca);


?>