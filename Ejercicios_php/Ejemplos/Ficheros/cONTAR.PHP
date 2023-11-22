<?php
$fp = file_get_contents('test2.txt');
if (!$fp) {
    echo 'No se pudo abrir archivo.txt';
}
echo substr_count($fp,"a");
?>