<?php
function ardel($ar,$lim){
    for($i=0;$i<count($ar);++$i){
        if($ar[$i]>$lim){
            unset($ar[$i]);
        }
    }
    return $ar;
}
var_dump(ardel([1,45,1,4,6,2,34,6,213,43,1,5,1],10));
?>