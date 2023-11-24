<?php
function test_entrada($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    return $valor;
   }

   $nameErr="Nombre correcto";
if (empty($_POST["name"])) {
 $nameErr = "El nombre es obligatorio";
 $name="";
 } else {
 $name = test_entrada($_POST["name"]);
 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 $nameErr = "Únicamente se permiten letras y espacios";
 }
}


$nameAp="Apellido/s correcto";
if (empty($_POST["ape"])) {
 $nameErr = "El apellido/s es obligatorio";
 $ape="";
 } else {
 $name = test_entrada($_POST["name"]);
 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 $nameErr = "Únicamente se permiten letras y espacios";
 }
}

if(isset($_POST["comment"])) {
    $com=$_POST["comment"];
}else {
    $com=""; 
}

?>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
Name: <input type="text" name="name" value="<?php echo $name; ?>">
<span class="error">* <?php echo $nameErr;?></span><br><br>
Apellidos: <input type="text" name="ape" value="<?php echo $ape; ?>">
<span class="error">* <?php echo $nameAp;?></span><br><br>
Comment: <textarea style="height:100px;width:300px" name="comment"><?php echo $com; ?></textarea>
<br><br>
<input type="submit" name="submit" value="Guardar">