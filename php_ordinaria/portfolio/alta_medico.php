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
        $espe=$_POST["especialidad"];
        $telef=$_POST["telef"];
        $mail=$_POST["mail"];
        $pass=$_POST["password"];
        $passconfirm=$_POST["password_confirmation"];
        $estado=$_POST["estado"];

        include "login.php";
        $conn=new Login();
        $con=$conn->log($_SESSION['user']['tipo']);
        $query="SELECT dniUsu FROM usuarios WHERE dniUsu LIKE '$id'";
        $result= $con->query($query);
        if (!$result) die("Fatal Error");
        if($result->num_rows==0){
            if($pass==$passconfirm){
            $query="INSERT INTO `medicos`(`dniMed`, `medNombres`, `medApellidos`, `medEspecialidad`, `medTelefono`, `medCorreo`)
            VALUES ('$id','$nombre','$apellidos','$espe','$telef','$mail')";
            $result= $con->query($query);
            if (!$result) die("Fatal Error");

            $query="INSERT INTO `usuarios`(`dniUsu`, `usuLogin`, `usuPassword`, `usuEstado`, `usutipo`)
            VALUES ('$id','$id','$pass','$estado','Medico')";
            $result= $con->query($query);
            if (!$result) die("Fatal Error");

            $confirm="correcto";
            }else{
                $confirm="contra";
            }
    }else{
        $confirm="incorrecto";
    }
}
    ?>
    <a href="inicio.php">← Volver al menu</a>
<h1 style="background-color:yellow; text-align:center;padding:15px">ASDI VIRTUAL</h1>
<?php
    if($confirm=="correcto"){
        echo <<<_END
            <h2 style="background-color:lightgreen; text-align:center; padding:15px">
                Se ha grabado con exito el medico con dni $id
            </h2>
        _END;
    }elseif($confirm=="incorrecto"){
        echo <<<_END
        <h2 style="background-color:red; text-align:center; padding:15px">
            El usuario con dni $id ya esta dado de alta
        </h2>
    _END;
    }elseif($confirm=="contra"){
        echo <<<_END
        <h2 style="background-color:red; text-align:center; padding:15px">
            La contraseña no se ha confirmado correctamente
        </h2>
        _END;
    }
?>
<div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:green; text-align:center;padding:15px;color:white">Alta de medico</h3>
            
            Nombre: <input type="text" name="nombre"  required><br>
            Apellidos: <input type="text" name="apellidos"  required><br>
            Especialidad: <input type="text" name="especialidad"  required><br>
            Telefono: <input type="text" name="telef"  required><br>
            Email: <input type="text" name="mail"  required><br>
            DNI: <input type="text" name="id"  required><br>
            Contraseña: <input type="password" name="password"  required><br>
            Repetir contraseña: <input type="password" name="password_confirmation" required><br>
            Estado:<select name="estado">
                    <option value="Activo" selected>Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            <div style="background-color:green; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" name="altap" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>