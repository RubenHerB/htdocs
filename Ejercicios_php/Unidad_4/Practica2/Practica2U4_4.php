<?php
if(isset($_POST['sexo'])){
    $sexo=$_POST['sexo'];
}
if(isset($sexo)!=true) {
$sexoErr="ERROR";}else{$sexoErr="";}
var_dump($sexo);
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
value="mujer"> Mujer
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
value="hombre"> Hombre
<span class="error">* <?php echo $sexoErr;?></span><br><br>
<input type="submit">
</form>