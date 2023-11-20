<?php
include('Practica2U4_9.php');
include('Practica2U4_10.php');
    $urlc=new url();
    $emailc=new email();

//Validacion nombre
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
//validacion email

if(isset($_POST["email"])) {
    $email=$_POST["email"];
    $emailErr=$emailc->validar_email($email);
}else {
    $email="";
    $emailErr="Se requiere Email";
}
//validacion url
if(isset($_POST["url"])) {
    $url=$_POST["url"];
    $urlErr=$urlc->validar_url($url);
}else {
    $url="";    
    $urlErr = "Se requiere Url";
}
//Relleno comment
if(isset($_POST["comment"])) {
    $com=$_POST["comment"];
}else {
    $com=""; 
}

 ?>
 <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
Name:<input type="text" name="name" value="<?php echo $name; ?>">
<span class="error">* <?php echo $nameErr;?></span><br><br>
E-mail:<input type="text" name="email" value="<?php echo $email; ?>">
<span class="error">* <?php echo $emailErr;?></span><br><br>
Website:<input type="text" name="url" value="<?php echo $url; ?>">
<span class="error">* <?php echo $urlErr;?></span><br><br>
Comment:<input type="text" name="comment" value="<?php echo $com; ?>">
<br><br>
<input type="submit">

</form>