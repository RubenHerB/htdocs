<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oposicion</title>
    <meta name="author" content="Ruben Hernando Bango">
    <style>
        input,span{border: 1px solid blue;border-radius: 10px; width: 200px;height: 30px;}
        .boton{background-color:blue; color: white;}
        .blue{background-color: lightblue;}
        .orange{background-color:orange;}
        table,td,th{border-collapse: collapse;}
        td,th{width:100px;padding: 4px 0 4px 0}
    </style>
</head>
    <?php 
        session_start(); 
        if(!isset($_SESSION)) header("Location: ejercicio1.php");
        $cod="";
        $pa="";
        $pb="";
        $tipo="";
        $insc="";
        $color="";
        $color2="";
        if(isset($_POST)){
            if(isset($_POST['cod'])){
                $cod=$_POST['cod'];
                $pa=$_POST['pa'];
                $pb=$_POST['pb'];
                $tipo=$_POST['tipo'];
                $insc=$_POST['insc'];
                $connection = new mysqli('localhost', 'root','', 'OPOSICION');
                    if ($connection->connect_error) die("Fatal Error");
                    $query = "SELECT codigocurso FROM curso WHERE codigocurso like '$cod' LIMIT 1";
                    $result = $connection->query($query);
                    if (!$result) die("Fatal Error"); 
                    if($result->num_rows==1 ? true : false){
                        $query = "SELECT codcurso FROM matricula WHERE codcurso like '$cod' AND dnialumno LIKE '".$_SESSION['dni']."' LIMIT 1";
                        $result = $connection->query($query);
                        if (!$result) die("Fatal Error");
                        if($result->num_rows==0 ? true : false){
                            $query = "INSERT INTO `matricula` (`dnialumno`, `codcurso`, `pruebaA`, `pruebaB`, `tipo`, `inscripcion`)
                            VALUES ('".$_SESSION['dni']."', '$cod', $pa, $pb, '$tipo', $insc)";
                            $result = $connection->query($query);
                            if (!$result){
                                die("Formato de datos incorrecto");
                            }else{
                                $color="style=\"background-color:lightblue\"";
                                $color2="style=\"background-color:lightblue\"";
                                echo "La matricula se ha grabado correctamente";
                            }
                        }else{
                            $color="style=\"background-color:red\"";
                            echo "El alumno ya se ha matriculado en este curso";
                            $cod="";
                        }
                    }else{
                        $color="style=\"background-color:red\"";
                        echo "El curso con el codigo $cod no existe";
                        $cod="";
                    }
            }
        }
    ?>
    <body>
        <table>
            <tr>
                <td class="orange">ALUMNO:</td>
                <td class="orange"><?php echo $_SESSION['dni'];?></td>
                <td class="blue">NOMBRE:</td>
                <td class="blue"><?php echo $_SESSION['nombre'];?></td>
            </tr>
        </table>
        <br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        DNI: <?php echo $_SESSION['dni'];?><br>
        COD CURSO: <input <?php echo $color;?> type="text" name="cod" value="<?php echo $cod;?>" required><br>
        PRUEBA A: <input <?php echo $color2;?> type="text" name="pa" value="<?php echo $pa;?>" required><br>
        PRUEBA B: <input <?php echo $color2;?> type="text" name="pb" value="<?php echo $pb;?>" required><br>
        TIPO: <input <?php echo $color2;?> type="text" name="tipo" value="<?php echo $tipo;?>" required><br>
        INSCRIPCION: <input <?php echo $color2;?> type="text" name="insc" value="<?php echo $insc;?>" required><br>
        <input type="submit" value="GUARDAR">   
        </form>
    </body>
</html>