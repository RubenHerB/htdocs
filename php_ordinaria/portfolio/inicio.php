<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button {
    padding: 5px 10vw;
    border: 1px outset buttonborder;
    border-radius: 3px;
    color: buttontext;
    background-color: buttonface;
    text-decoration: none;
}
    </style>
</head>
<body>
    <?php 
        session_start();
    ?>
<h1 style="background-color:yellow; text-align:center;padding:15px; width:30%; margin-left:35%"><?php echo $_SESSION['user']['tipo']; ?></h1>
<div style="text-align:center;  ">
<?php 
switch ($_SESSION['user']['tipo']){
    case "Asistente":
        echo <<<_END
        <a href="citas_atentidas.php" class="button">Ver citas atendidas</a><br><br>
        <a href="neva_cita.php" class="button">Nueva cita</a><br><br>
        <a href="alta_paciente.php" class="button">Alta paciente</a><br><br>
        <a href="ver_paciente.php" class="button">Ver pacientes</a><br><br>
    _END;
    break;
    case "Medico":
        echo <<<_END
        <a href="citas_atentidas.php" type="button">Ver citas atendidas</a><br><br>
        <a href="citas_pendientes.php" class="button">Ver citas pendientes</a><br><br>
        <a href="ver_paciente.php" class="button">Ver pacientes</a><br><br>
    _END;
    break;
    case "Administrador":
        echo <<<_END
        <a href="alta_paciente.php" class="button">Alta paciente</a><br><br>
        <a href="alta_medico.php" class="button">Alta medico</a><br><br>
        _END;
    break;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<input type="submit" value="Cerrar sesion" name="cierre" class="button"/>
</form>
</div>
</body>
</html>
