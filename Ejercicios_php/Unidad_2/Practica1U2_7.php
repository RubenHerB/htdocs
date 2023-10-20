<?php

	for ($count = 1 ; $count <= 50 ; $count++){
		$c=true;
		for($count2 = 2 ; $count2 < $count ; $count2++)
			if($count%$count2==0)
				$c=false;
		if($c)
			echo $count," ";		
	}
?> 