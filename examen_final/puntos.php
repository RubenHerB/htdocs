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
        td,th{padding: 10px}
        .grafico{background-color: turquoise;height:20px;}
    </style>
</head>
<body>
    <?php
   
    session_start();
    if(!isset($_SESSION)){
        header("Location: index.php");
    }
    ?>
<h1>Puntos por jugador</h1>
<table>
    <tr><th>Login</th><th>Puntos</th></tr>
    <?php
        include 'login.php';
        $query="SELECT max(puntos) as maximos FROM jugador";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        $result->data_seek(0);
        $max=$result->fetch_assoc()['maximos'];

        $query="SELECT login, puntos FROM jugador";
        $result= $connection->query($query);
        if (!$result) die("Fatal Error");
        foreach($result as $r){
            $log=$r['login'];
            $num=$r['puntos'];
            echo "<tr><td>$log</td><td>$num</td><td><div class=\"grafico\" style=\"width:".(250*$num/$max)."px\"></div></td></tr>";
        }
    ?>
</table>
</body>
</html>