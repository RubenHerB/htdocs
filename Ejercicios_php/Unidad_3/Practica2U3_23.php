<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Practica 23</title>
</head>

<body>
<ul>
<?php
$fam=array("Los Simpson"=>array("padre"=>"Homer","madre"=>"Marge","hijos"=>array("Bart","Lisa","Maggie")),
    "Los Griffin"=>array("padre"=>"Peter","madre"=>"Lois","hijos"=>array("Chris","Meg","Stewie")));
    foreach($fam as $in1=>$con1){
        echo "<li>familia: $in1</li><ul>";
        foreach($con1 as $in2=>$con2){
            if (gettype($con2)=="array"){
                echo "<li>$in2:<ul>";
            foreach($con2 as $con3){
            echo "<li>$con3</li>";
            }
            echo '</ul></li>';
        }else{
            echo "<li>$in2:$con2</li>";
        }
    }
    echo '</ul>';
}
?>
</ul>
</body>
</html>