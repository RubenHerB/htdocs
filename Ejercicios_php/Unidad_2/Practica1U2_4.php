<?php
	$x=rand();
	$y=rand();
	$m=max($x, $y);
	echo $x , ", " , $y . ", el mayor es " , $m . " y " , $m%2==0 ? "":"no " , "es par"; 
?>