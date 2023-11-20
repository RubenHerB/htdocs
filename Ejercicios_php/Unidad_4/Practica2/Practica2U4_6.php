<?php

$email=$_POST['email'];
$emailErr="Email correcto";
if (empty($email)) {
 $emailErr = "Se requiere Email";
 } else {
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Fomato de Email invalido";
 }
 }
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span><br><br>
<input type="submit">
</form>