<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
    ?>
<h1 style="background-color:yellow; text-align:center;padding:15px; width:30%; margin-left:35%"><?php echo $_SESSION['user']['tipo']; ?></h1>
<?php 
switch ($_SESSION['user']['tipo']){
    case "Asistente":
        echo <<<_END
        <a href="citas_atentidas.php" type="button">Ver citas atendidas</a><br><br>
        <a href="neva_cita.php" type="button">Nueva cita</a><br><br>
        <a href="alta_paciente.php" type="button">Alta paciente</a><br><br>
        <a href="ver_paciente.php" type="button">Ver pacientes</a><br><br>
    _END;
    break;
    case "Medico":
        echo <<<_END
        <a href="citas_atentidas.php" type="button">Ver citas atendidas</a><br><br>
        <a href="citas_pendientes.php" type="button">Ver citas pendientes</a><br><br>
        <a href="ver_paciente.php" type="button">Ver pacientes</a><br><br>
    _END;
    break;
    case "Administrador":
        echo <<<_END
        <a href="alta_paciente.php" type="button">Alta paciente</a><br><br>
        <a href="alta_medico.php" type="button">Alta medico</a><br><br>
        _END;
    break;

}
?>
</body>
</html>
