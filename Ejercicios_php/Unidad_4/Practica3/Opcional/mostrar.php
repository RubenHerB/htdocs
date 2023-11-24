<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<input type="submit" name="submit" value="Mostrar info">
</form>
<?php
if (isset($_POST) && $_POST['submit']=="Mostrar info"){
    $fp = fopen('datos.txt', 'r');
if (!$fp) {
    echo 'No se pudo abrir archivo.txt';
}
while (false !== ($lin = fgets($fp))) {
    echo "$lin<br/>";
}
}
?>