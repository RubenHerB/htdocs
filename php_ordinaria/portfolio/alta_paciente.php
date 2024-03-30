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
            Identificacion: <input type="text" name="id" value="<?php echo $id ?>" required><br>
            Nombre: <input type="text" name="nombre" value="<?php echo $nombre ?>" required><br>
            Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos ?>" required><br>
            Fecha nacimiento: <input type="date" name="fecha" value="<?php echo $fecha ?>" max='<?php echo date('Y-m-d'); ?>' required><br>
            Sexo:<select name="sexo">
                    <option value="Femenino" selected>Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            <div style="background-color:green; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>