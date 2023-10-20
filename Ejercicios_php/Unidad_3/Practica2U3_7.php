<?php
    for ($i=0;$i<3;$i++){
        for ($j=0;$j<4;$j++){
        $ran[$i][$j]=rand();
        }
    }
    for ($i=0;$i<count($ran);$i++){
        $max[]=max($ran[$i]);
        $avg[]=array_sum($ran[$i]) / count($ran[$i]);
    }
    for ($i=0;$i<count($max);$i++){
        echo $max[$i]," ";
    }
    echo '<br>';
    for ($i=0;$i<count($avg);$i++){
        echo $avg[$i]," ";
    }
?>