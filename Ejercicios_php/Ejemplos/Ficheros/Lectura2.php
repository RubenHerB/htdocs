<?php
$fp = fopen('testfile.txt', 'r');
if (!$fp) {
    echo 'No se pudo abrir archivo.txt';
}
while (false !== ($carácter = fgetc($fp))) {
    echo "$carácter\n";
}
echo '<br/>';
$fp = fopen('testfile.txt', 'r');
if (!$fp) {
    echo 'No se pudo abrir archivo.txt';
}
while (false !== ($carácter = fgets($fp))) {
    echo "$carácter ";
}

?>