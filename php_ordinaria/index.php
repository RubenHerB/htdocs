<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro medico</title>
</head>
<body>
    <h1 style="background-color:yellow; text-align:center;padding:15px">CENTRO MEDICO ASDI VIRTUAL</h1>
    <div>
        <form>
            <h3 style="background-color:red; text-align:center;padding:15px;color:white">Inicio Sesion</h3>
            Login: <input type="text" name="login" value="<?php echo $login ?>" ><br>
            Password: <input type="password" name="password" value="<?php echo $password ?>" >
            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>