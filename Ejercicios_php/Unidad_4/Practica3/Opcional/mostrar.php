<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<input type="submit" name="submit" value="Mostrar info">
</form>
<?php
if ($_POST!=null){
    $fp = fopen('datos.txt', 'r');
if (!$fp) {
    echo 'No se pudo abrir archivo.txt';
}
while (false !== ($lin = fgets($fp))) {
    echo "$lin<br/>";
}
}
?>