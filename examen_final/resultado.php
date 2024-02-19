<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td,th{
            border-collapse: collapse;border:1px solid black;
        }
        td,th{padding: 15px}
    </style>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    ?>
    <h1>Fecha: <?php echo DATE('Y-m-d');?></h1>
    <?php
        include 'login.php';
        $query="SELECT solucion FROM solucion WHERE fecha = '".DATE('Y-m-d')."'";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        $result->data_seek(0);
        $respuesta=$result->fetch_assoc()['solucion'];

        $query="SELECT login, hora FROM respuestas WHERE fecha = '".DATE('Y-m-d')."' AND respuesta LIKE '$respuesta'";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        $n=$result->num_rows;
        echo "<h2>Jugadores acertantes: $n</h2>
        <table><tr><th>Login</th><th>Hora</th></tr>";
        foreach ($result as $r){
            echo "<tr><td>".$r['login']."</td><td>".$r['hora']."</td></tr>";
        }
        echo "</table>";



        $query="SELECT login, hora FROM respuestas WHERE fecha = '".DATE('Y-m-d')."' AND respuesta NOT LIKE '$respuesta'";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        $n=$result->num_rows;
        echo "<h2>Jugadores que han fallado: $n</h2>
        <table><tr><th>Login</th><th>Hora</th></tr>";
        foreach ($result as $r){
            echo "<tr><td>".$r['login']."</td><td>".$r['hora']."</td></tr>";
        }
        echo "</table>";
        $connection->close();
    ?>
</body>
</html>