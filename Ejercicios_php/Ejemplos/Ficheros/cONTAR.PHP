<?php
function cont($f,$l){
$fp = file_get_contents($f);
if (!$fp) {
    return 'No se pudo abrir archivo.txt';
}
return "La letra $l se repite ".substr_count($fp,$l)." veces";
}
?>
<form method="post" action=""<?php echo $_SERVER["PHP_SELF"]; ?>">
    Nombre fichero: 
    <input type="text" name="nombre"><br />
    
    Letra a contar: 
    <input type="text" name="letra"><br />
    <input type="submit">
</form>
<?php
    if (isset($_POST['nombre']) && isset($_POST['nombre']) && $_POST['nombre']!=""&& $_POST['letra']!=""){
        echo cont($_POST['nombre'],$_POST['letra']);
    }
?>