<?php
class Circulos{
    
    function __construct () {
    }

    function pintar($c){
        $col=["black","red","#4772ff","yellow","green"];
        $style="";
        if(count($c)>4){
          $style=";width:".(90/count($c))."%;margin-left:".(5/count($c))."%;margin-right:".(5/count($c))."%";
        }
        foreach($c as $p)
        echo "<span class=\"dot\" id=\"dot\" style=\"background-color:",$col[$p],"$style\"></span>";
      }
}
?> 