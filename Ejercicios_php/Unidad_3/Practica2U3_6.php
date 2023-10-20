<?php
    for ($i=0;$i<4;$i++){
        for ($j=0;$j<5;$j++){
        $ran[$i][$j]=rand();
        }
    }
    $max=0;
    $maxi=0;
    $maxj=0;
    for ($i=0;$i<count($ran);$i++){
        for ($j=0;$j<count($ran[0]);$j++){
            if($ran[$i][$j]>$max){
                $max=$ran[$i][$j];
                $maxi=$i;
                $maxj=$j;
            }
        }
    }
    echo "El elemento mayor es el $max en la posicion ($maxi,$maxj)";
?>