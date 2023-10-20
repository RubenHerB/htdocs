<?php
	$x=rand(1,1000);
	$p=true;
	for ($i=2;$i<$x && $p;$i++)
		if($x%$i==0)
			$p=false;
	if($p)
		echo $x, " es primo";
	else
		echo $x, " no es primo";
?>