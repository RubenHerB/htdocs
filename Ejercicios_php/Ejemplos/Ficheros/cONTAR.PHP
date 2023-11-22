<?php
$fp = fopen('test2.txt', 'r');
if (!$fp) {
    echo 'No se pudo abrir archivo.txt';
}
echo substr_count($fp,"a");
?>