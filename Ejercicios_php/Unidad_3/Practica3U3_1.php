<?php
	function eq($a,$b,$c){
	$det=$b**2 - 4*$a*$c;
	if($det<0){
		return array(false);
	}elseif($det==0){
		return array(-$b/(2*$a));
	}else{
		return array((-$b+$det**0.5)/(2*$a),(-$b-$det**0.5)/(2*$a));
	}}
	foreach(eq(2,10,3) as $ar){
		if(!$ar){
			echo "La ecuacion no tiene soluciones reales";
		}
		echo " $ar ";
	}
?>