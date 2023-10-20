<?php
	$x=rand(1,1000);
	$sum=1;
	echo $x," 1";
	for ($i=2;$i<=($x/2);$i++){
		if($x%$i==0){
			$sum+=$i;
			echo " + ", $i;
		}
	}
	echo " = ",$sum;
	if($x==$sum){
		echo ", es un numero perfecto";
	}else{
		echo ", no es un numero perfecto";
	}
?> 