<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $confirm="";
    session_start();
    if(isset($_POST["altap"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $fecha=$_POST["fecha"];
        $sexo=$_POST["sexo"];

        $conn=new Login();
            $con=$conn->log($_SESSION['user']['tipo']);
            $query="INSERT INTO `pacientes`(`dniPac`, `pacNombres`, `pacApellidos`, `pacFechaNacimiento`, `pacSexo`)
            VALUES ('$id','$nombre','$apellidos','$fecha','$sexo')";
            $result= $con->query($query);
            if (!$result) die("Fatal Error");

            $query="INSERT INTO `usuarios`(`dniUsu`, `usuLogin`, `usuPassword`, `usuEstado`, `usutipo`)
            VALUES ('$id','$id','','Inactivo','Paciente')";
            $result= $con->query($query);
            if (!$result) die("Fatal Error");

            $confirm="correcto";
    }
    ?>
    <a href="inicio.php">← Volver al menu</a>
<h1 style="background-color:yellow; text-align:center;padding:15px">ASDI VIRTUAL</h1>
<?php
    if($confirm=="correcto"){
        echo <<<_END
            <h2 style="background-color:lightgreen; text-align:center; padding:15px">
                Se ha grabado con exito el paciente con dni $id
            </h2>
        _END;
    }elseif($confirm=="incorrecto"){
        echo <<<_END
        <h2 style="background-color:lightred; text-align:center; padding:15px">
            El usuario con dni $id ya esta dado de alta
        </h2>
    _END;
    }
?>
<div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:green; text-align:center;padding:15px;color:white">Inicio Sesion</h3>
            Identificacion: <input type="text" name="id"  required><br>
            Nombre: <input type="text" name="nombre"  required><br>
            Apellidos: <input type="text" name="apellidos"  required><br>
            Fecha nacimiento: <input type="date" name="fecha" max='<?php echo date('Y-m-d'); ?>' required><br>
            Sexo:<select name="sexo">
                    <option value="Femenino" selected>Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            <div style="background-color:green; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" name="altap" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>