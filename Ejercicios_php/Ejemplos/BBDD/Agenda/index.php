<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

</head>
<body>
    <h1>Agenda de contactos</h1>
    <?php 
    if(isset($_POST['usuario'])) {
        $usu=$_POST["usuario"];
        $pass=$_POST["clave"];

        $connection = new mysqli('localhost', 'root','', 'AGENDA');
        if ($connection->connect_error) die("Fatal Error");
        $query = "SELECT Codigo,Nombre FROM usuarios WHERE Nombre like '$usu' AND Clave like '$pass'";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
        $rows = $result->num_rows; 
        $c=0;
        if($rows>0){
            $result->data_seek(0); 
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $c=$row["Codigo"];
            session_start();
            $emojis=[0,0,0,0,0];
            for ($i=0;$i<count($emojis);$i++) {
                $emojis[$i]=rand(0,4);
            }
            $_SESSION=['cod'=>$c,'usu'=>$usu,'con'=>1,'emo'=>$emojis];
            $connection->close(); 
            header("Location: inicio.php");
        }else{
            echo "Usuario o contraseña incorrrectas<br>";
        }
    }else{
        $error="";
        $usu="";
    }
    ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
Usuario: <input type="text" name="usuario" value="<?php echo $usu ?>" required>
Clave: <input type="password" name="clave" " required>
<input type="submit">
</form>
</body>
</html>