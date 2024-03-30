<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="background-color:yellow; text-align:center;padding:15px">ASDI VIRTUAL</h1>
<div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:green; text-align:center;padding:15px;color:white">Inicio Sesion</h3>
            <?php
            if($errorlog!=""){
                echo "<p style=\"color:red\">$errorlog</p>";
            }
            ?>
            Login: <input type="text" name="login" value="<?php echo $login ?>" ><br>
            Password: <input type="password" name="password" value="<?php echo $password ?>" >
            <div style="background-color:green; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>