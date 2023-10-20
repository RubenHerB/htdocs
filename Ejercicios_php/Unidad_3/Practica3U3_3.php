<?php
function pal($str){
    $auxstr=strrev($str);
    if($str==$auxstr){
        return true;
    }else{
        return false;
    }
}
$pal="hoja";
if(pal($pal)){
    echo "$pal es un palindromo";
}else{
    echo "$pal no es un palindromo";
}

?>