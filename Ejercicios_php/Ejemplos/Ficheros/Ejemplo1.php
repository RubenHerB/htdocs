<?php // testfile.php
 $fh = fopen("testfile.txt", 'w') or die("Failed to create file");
 $text =  
 "Line 1
Line 2
Line 3
";
 fwrite($fh, $text) or die("Could not write to file");
 fclose($fh);
 echo "File 'testfile.txt' written successfully";
?>