<?php
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
if(isset($_POST["email"])) {
    $email=$_POST["email"];
}else {
    $email="";
    include('Practica2U4_9.php');
    $emailErr=validar_email($email);
}
//validacion url
if(isset($_POST["url"])) {
    $url=$_POST["url"];
}else {
    $url="";
    include('Practica2U4_10.php');
    $urlErr=validar_url($url);
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