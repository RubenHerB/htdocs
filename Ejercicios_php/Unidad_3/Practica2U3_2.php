<?php
$academia=array(array(1, 14, 8, 3),
    array(6, 19,7 ,2),
    array(3, 13, 4, 1)
);
for($i=0;$i<count($academia);++$i){
    for($j=0;$j<count($academia[0]);++$j){
        echo $academia[$i][$j];
        echo " ";
    }
    echo '<br>';
}
?>