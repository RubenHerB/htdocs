<?php
    for ($i=0;$i<3;$i++){
        for ($j=0;$j<5;$j++){
        $ran[$i][$j]=rand();
        }
    }


    for ($i=0;$i<count($ran);$i++){
        for ($j=0;$j<count($ran[0]);$j++){
        echo $ran[$i][$j]." ‎ ‎ ‎ ‎ ‎ ";
    }
    echo " | ";
}
for ($j=0;$j<count($ran[0]);$j++){
    for ($i=0;$i<count($ran);$i++){
        echo $ran[$i][$j]." ‎ ‎ ‎ ‎ ‎ ";
    }
    echo " | ";
}
?>