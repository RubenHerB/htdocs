<?php
function validar_email($email){
    $emailErr="Email correcto";
    if (empty($email)) {
     $emailErr = "Se requiere Email";
     } else {
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Fomato de Email invalido";
     }
     }

//Validacion nombre
function test_entrada($valor) {
    $valor = trim($valor);
    $valor = stripslashes($valor);
    return $valor;
   }
   $nameErr="";
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
$emailErr="";
if(isset($_POST["email"])) {
    $email=$_POST["email"];
}else {
    $email="";
    $emailErr=validar_email($email);
}
//validacion url
$urlErr="";
if(isset($_POST["url"])) {
    $url=$_POST["url"];
}else {
    $url="";
    $urlErr=$urlc->validar_url($url);
}


 ?>
 <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
Name:<input type="text" name="name" value="<?php echo $name; ?>">
<span class="error">* <?php echo $nameErr;?></span><br><br>
E-mail:<input type="text" name="email" value="<?php echo $email; ?>">
<span class="error">* <?php echo $emailErr;?></span><br><br>
Website:<input type="text" name="url" value="<?php echo $url; ?>">
<span class="error">* <?php echo $urlErr;?></span><br><br>
<input type="submit">

</form>