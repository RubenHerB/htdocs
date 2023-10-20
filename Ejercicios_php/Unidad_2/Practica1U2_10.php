<?php
	for($x=1;$x<=9;$x++){
		for($y=1;$y<=9;$y++){
			if ($x!=$y){
				echo "( ", $x , "," , $y , " ) ";
			}
		}
		echo '<br>';
	}
?> 