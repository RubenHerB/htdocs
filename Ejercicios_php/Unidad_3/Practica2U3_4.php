<?php
    for ($i=0;$i<4;$i++){
        for ($j=0;$j<4;$j++){
        $ran[$i][$j]=rand();
        }
    }
    for ($i=0;$i<count($ran);$i++){
        echo $ran[$i][$i]." ‎ ‎ ‎ ‎ ‎ ";
    }
    echo '<br>';
    for ($i=0;$i<count($ran);$i++){
        echo $ran[$i][count($ran)-(1+$i)]." ‎ ‎ ‎ ‎ ‎ ";
    }
?>