<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oposicion</title>
    <meta name="author" content="Ruben Hernando Bango">
    <style>
        input{border: 1px solid blue;border-radius: 10px; width: 200px;height: 30px;}
        .boton{background-color:blue; color: white;}
    </style>
</head>
    <body>
    <?php
            $dni="";
            if(isset($_POST)){
                if(isset($_POST["dni"])){
                    $dni=$_POST["dni"];
                    $connection = new mysqli('localhost', 'root','', 'OPOSICION');
                    if ($connection->connect_error) die("Fatal Error");
                    $query = "SELECT dniA , nombreA FROM alumno WHERE dniA like '$dni' LIMIT 1";
                    $result = $connection->query($query);
                    if (!$result) die("Fatal Error");
                    // var_dump($result->num_rows);echo "<br>";    
                    if($result->num_rows==1 ? true : false){
                        $result->data_seek(0); 
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        var_dump($row);
                        session_start();
                        $_SESSION=["nombre"=>$row['nombreA'],"dni"=>$row['dniA']];
                        // header("Location: ejercicio3.php");
                        // var_dump($_SESSION);
                    }else{
                        $query = "SELECT dniP , nombreP FROM profesor WHERE dniP like '$dni' LIMIT 1";
                        $result = $connection->query($query);
                        if (!$result) die("Fatal Error");
                        if($result->num_rows==1 ? true : false){
                            $result->data_seek(0); 
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            session_start();
                            $_SESSION=["nombre"=>$row['nombreP'],"dni"=>$row['dniP']];
                            header("Location: ejercicio2.php");
                            // var_dump($_SESSION);
                        }else{
                            echo "No existe ningun alumno o profesor con ese DNI <br/>";
                        }
                    }
                }
            }
        ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            DNI:<br />
            <input type="text" name="dni" value="<?php echo $dni?>"><br/><br/>
            <input class="boton" type="submit" value="ENTRAR" />
        </form>
    </body>
</html>

