<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
    <body>
        <?php
        if(!isset($c) || !$c){
            echo <<<_END
                <form method="post" action="login.php">
                    Login del usuario: 
                    <input type="text" name="user"> 
                    Clave: 
                    <input type="password" name="password">
                    <input type="submit" name="Iniciar sesion">
                </form>
            _END;
            if($_POST!=null){
                $c=false; 
                if(isset($_POST['user']) && $_POST['password']){
                    $user=$_POST['user'];
                    $pass=$_POST['password'];
                    $connection = new mysqli('localhost', 'loginventas','log', 'ventas');
                    $query = "SELECT * FROM usuarios WHERE usuario like '$user' AND password like '$pass'";
                    $result = $connection->query($query);
                    if (!$result) die("Fatal Error");
                    $rows = $result->num_rows;
                    echo "Se esta intentando validar como el usuario $user<br>";
                    if($rows==0){
                        $connection->close();
                        echo"El usuario $user no existe, vuelva a validar otro usuario";
                    }else{
                        $c=true;
                        $result->data_seek(0);
                        $r=$result->fetch_array(MYSQLI_ASSOC);

                        var_dump($r);
                    }
                }else{
                    echo 'Rellena todos los campos';
                }
            }
    }
        ?>
    </body>
</html>