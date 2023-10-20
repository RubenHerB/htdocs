<?php
	$paper[] = "Copier";
	$paper[] = "Inkjet";
	$paper[] = "Laser";
	$paper[] = "Photo";
	print_r($paper);
	echo '<br>';
	var_dump($paper);
	echo '<br>';
	for ($j = 0 ; $j < 4 ; ++$j)
		echo "$j: $paper[$j]<br>"; 
	
	
	$paper1[] = "Copier";
	$paper1[] = "Inkjet";
	$paper1[] = 125;
	$paper1[] = 30;
	print_r($paper1);
	echo '<br>';
	var_dump($paper1);
	echo '<br>';
	
	
	$paper2['copier'] = "Copier & Multipurpose";
	$paper2['inkjet'] = "Inkjet Printer";
	$paper2['laser'] = "Laser Printer";
	$paper2['photo'] = "Photographic Paper";
	echo $paper2['laser'];
	echo '<br>';
	print_r($paper2);
	echo '<br>';
	var_dump($paper2);
	echo '<br>';
	
	
	 $p1 = array("Copier", "Inkjet", "Laser", "Photo");

 echo "p1 element: " . $p1[2] . "<br>";
 
 
 $p2 = array('copier' => "Copier & Multipurpose",
 'inkjet' => "Inkjet Printer",
 'laser' => "Laser Printer",
 'photo' => "Photographic Paper");
 echo "p2 element: " . $p2['inkjet'] . "<br>"; 
 
 
  $paper2 = array("Copier", "Inkjet", "Laser", "Photo");
 

 foreach($paper2 as $j => $item)
 {
 echo "$j: $item<br>";

 }
 
  foreach($paper2 as $item => $description)
 echo "$item: $description<br>"; 
 
 
 
 
 
 
 $paper3 = array('copier' => "Copier & Multipurpose",
					'inkjet' => "Inkjet Printer",
					'laser' => "Laser Printer",
					'photo' => "Photographic Paper");
					
 foreach($paper3 as $item => $description)
	echo "$item: $description<br>"; 
 
 $products = array(
 'paper' => array(
 'copier' => "Copier & Multipurpose",
 'inkjet' => "Inkjet Printer",
 'laser' => "Laser Printer",
 'photo' => "Photographic Paper"),
 'pens' => array(
 'ball' => "Ball Point",
 'hilite' => "Highlighters",
 'marker' => "Markers"),
 'misc' => array(
 'tape' => "Sticky Tape",
 'glue' => "Adhesives",
 'clips' => "Paperclips"
 )
 );
 echo "<pre>";
 foreach($products as $section => $items)
 foreach($items as $key => $value)
 echo "$section:\t$key\t($value)<br>";
 echo "</pre>";
?>