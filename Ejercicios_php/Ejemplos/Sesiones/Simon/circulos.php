<?php
class Circulos{
    
    function __construct () {
    }

    function pintar($c){
        $col=["black","red","#4772ff","yellow","green"];
        foreach($c as $p)
        echo "<span class=\"dot\" style=\"background-color:",$col[$p],"\"></span>";
      }
}
?>