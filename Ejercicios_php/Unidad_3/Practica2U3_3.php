<?php
    $c=0;
    $n=1;
    while($c<10){
    $p=true;
    for($i=2;$i<$n && $p;++$i){
        if($n%$i==0){
            $p=false;
        }
    }
    if($p){
        ++$c;
        $primos[]=$n;
    }
    $n++;
    }
    foreach($primos as $t){
        echo $t.'<br>';
    }
?>