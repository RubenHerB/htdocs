<?php
require "Matematicas.php";
foreach(eq(2,10,3) as $ar){
		if(!$ar){
			echo "La ecuacion no tiene soluciones reales";
		}
		echo " $ar ";
	}
?>