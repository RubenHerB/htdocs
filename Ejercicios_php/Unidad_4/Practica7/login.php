<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
    <body>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            Login del usuario: 
            <input type="text" name="user"> 
            Clave: 
            <input type="password" name="password">
            <input type="submit" name="Iniciar sesion">
        </form>

        <?php
            if($_POST!=null){
                if(isset($_POST['user']) && $_POST['password']){
                    $user=$_POST['user'];
                    $pass=$_POST['password'];
                    $connection = new mysqli('localhost', 'loginventas','log', 'ventas');
                    $query = "SELECT * FROM usuarios WHERE usuario like '$user' AND password like '$pass'";
                    $result = $connection->query($query);
                    if (!$result) die("Fatal Error");
                    $rows = $result->num_rows;
                }else{
                    echo 'Rellena todos los campos';
                }
            }
        ?>
    </body>
</html>