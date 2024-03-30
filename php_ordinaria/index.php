<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro medico</title>
</head>
<body>
    <?php
    var_dump($_POST);
        $login="";
        $password="";
        $errorlog="";
        if(isset($_POST["login"])){
            $login=$_POST["login"];
            $password=$_POST["password"];

        if($login==""|| $password==""){
            $errorlog="Rellena todos los campos del formulario para iniciar sesion";
        }else{
            include "portfolio/login.php";
            $conn=new Login();
            $con=$conn->log("");
            $query="SELECT * FROM usuarios WHERE usuLogin LIKE '".$login."'";
            $result= $con->query($query);
            if (!$result) die("Fatal Error");
      
            if($result->num_rows==0){
                $errorlog="El usuario introducido no esta registrado";
            }else{
                $result->data_seek(0);
                $r=$result->fetch_array(MYSQLI_ASSOC);
                 if(password_verify($password, $r['usuPassword'])){
                    if($r["usuTipo"]=="Paciente"){
                        $errorlog="El usuario seleccionado no ha sido implementado todavia";
                    }else{
                    session_start();
                    $_SESSION=["user"=>["dni"=>$r["dniUsu"],"tipo"=>$r["usuTipo"]]];
                    header("Location: portfolio/inicio.php");
                    }
            }else{
                $errorlog="Contraseña incorrecta";
            }
        }
        }
    }
    ?>
    <h1 style="background-color:yellow; text-align:center;padding:15px">CENTRO MEDICO ASDI VIRTUAL</h1>
    <div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:red; text-align:center;padding:15px;color:white">Inicio Sesion</h3>
            <?php
            if($errorlog!=""){
                echo "<p style=\"color:red\">$errorlog</p>";
            }
            ?>
            Login: <input type="text" name="login" value="<?php echo $login ?>" ><br>
            Password: <input type="password" name="password" value="<?php echo $password ?>" >
            <div style="background-color:red; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>