<?php
	$a=15;
	$b=100;
	$c=20;
	$det=$b**2 - 4*$a*$c;
	if($det<0){
		echo "La ecuacion no tiene soluciones reales";
	}elseif($det==0){
		echo "La unica solucion es ", -$b/(2*$a);
	}else{
		echo "Hay 2 soluciones ", (-$b+$det**0.5)/(2*$a)," y ",(-$b-$det**0.5)/(2*$a);
	}
?>