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
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    ?>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; echo DATE('Y-m-d');?>!</h1>
    <img src="imagen/20240216.jpg" alt="jerogrifico" width="400px" height="auto">

    <?php
    include 'login.php';
    $query="SELECT solucion FROM solucion WHERE fecha = '".DATE('Y-m-d')."'";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        $result->data_seek(0);
        $solucion=$result->fetch_assoc()['solucion'];

    if(isset($_POST['rescon'])){
        if($_POST['res']!=""){
            $query="Insert into respuestas (fecha,login,hora,respuesta) values
            ('".DATE('Y-m-d')."','".$_SESSION['login']."','".DATE('H:i:s')."','".$_POST['res']."')";
            $result= $connection->query($query);
            if (!$result) die("Fatal Error");


            

        if($solucion==$_POST['res']){

        $query="SELECT puntos FROM jugador WHERE login = '".$_SESSION['login']."'";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        $result->data_seek(0);
        $puntos=$result->fetch_assoc()['puntos'];

        $query="UPDATE jugador SET  puntos =".($puntos+1)."  WHERE login = '".$_SESSION['login']."'";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");

        }
    
        }else{
            echo "<div style=\"color:red\">Rellena el campo para poder responder</div>";
        }
    }

    $query="SELECT respuesta FROM respuestas WHERE login = '".$_SESSION['login']."' AND fecha = '".DATE('Y-m-d')."'";
    $result= $connection->query($query);
    if (!$result) die("Fatal Error");
    if($result->num_rows==1){
        $result->data_seek(0);
        echo "<div style=\"color:";
        if($result->fetch_assoc()['respuesta']===$solucion){
            echo "green";
        }else{
            echo "orange";
        }
        $result->data_seek(0);
        echo "\">Tu respuesta de hoy : ".$result->fetch_assoc()['respuesta']."<p>La respuesta correcta era $solucion</p></div>";
    }else{
        echo <<<_END
            <form method='post' action="
            _END;
            echo $_SERVER['PHP_SELF'];
            echo <<<_END
            ">
            <input type='hidden' name='rescon' value='res' />
            Solucionar el jerogrifico:
            <input type='text' name='res' value='' /><br>
            <input type="submit" value="Enviar"/>
            </form>
        _END;
    }
    $connection->close();
    ?>
    <br>
    <a href="puntos.php">Ver puntos del jugador</a><br>
    <a href="resultado.php">Resultados del dia</a>
</body>
</html>