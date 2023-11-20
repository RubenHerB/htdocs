<?php
function test_entrada($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    return $valor;
   }
   var_dump(test_entrada(" Es tu nombre O\'reilly? "));
?>