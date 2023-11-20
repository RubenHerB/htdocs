<?php
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span><br><br>
<input type="submit">
</form>