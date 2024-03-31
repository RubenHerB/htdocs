<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="inicio.php">← Volver al menu</a>
<h1 style="background-color:yellow; text-align:center;padding:15px">ASDI VIRTUAL</h1>
<div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:red; text-align:center;padding:15px;color:white">ASIGNAR CITA</h3>
            Paciente: <select name="paciente" required>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select><br>
            Fecha: <input type="date" name="fecha" min='<?php echo date('Y-m-d'); ?>' required><br>
            Hora: <input type="time" name="hora" required><br>
            Medico: <select name="medico" required>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select><br>
            Consultorio: <select name="consultorio" required>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            <div style="background-color:red; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" name="nuevac" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>