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
//validacion sexo

if(isset($_POST['sexo'])){
    $sexo=$_POST['sexo'];
    $sexoErr="";
}else{
    $sexo="";
    $sexoErr="Escoge un sexo";
}
 ?>
 <style>
    .error {
  color: red;
  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}
 </style>
 <h1>Form validation example</h1>
 <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
Name: <input type="text" name="name" value="<?php echo $name; ?>">
<span class="error">* <?php echo $nameErr;?></span><br><br>
E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
<span class="error">* <?php echo $emailErr;?></span><br><br>
Website: <input type="text" name="url" value="<?php echo $url; ?>">
<span class="error">* <?php echo $urlErr;?></span><br><br>
Comment: <textarea style="height:100px;width:300px" name="comment"><?php echo $com; ?></textarea>
<br><br>
Gender: <input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
value="mujer"> Mujer
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
value="hombre"> Hombre
<span class="error">* <?php echo $sexoErr;?></span><br><br>
<input type="submit">
</form>
<h2>Your input</h2>
<?php
echo "$name<br>$email<br>$url<br>$com<br>$sexo"
?>