<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
    <style>
        table,td,th{border: 1px solid black;border-collapse: collapse;}
    </style>
</head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION["admin"])){
            header("Location:login.php");
        }
        if($_SESSION["admin"]){
            $connection = new mysqli('localhost', 'administrador','administrador', 'ventas');
        }else{
            $connection = new mysqli('localhost', 'consultor','consultor', 'ventas');
        }
        ?>
        <table>
            <tr><th>id</th><th>descripcion</th><th>precio</th><th>caracteristicas</th></tr>
            <?php
            $query = "SELECT * FROM articulos";
            $result = $connection->query($query);
            if (!$result) die("Fatal Error");
            $rows = $result->num_rows;
            for($i=0;$i<$rows;$i++){
                echo "<tr>";
                $result->data_seek($i);
                $r=$result->fetch_array(MYSQLI_ASSOC);
                foreach($r as $a){
                    echo "<td>$a</td>";
                }
                echo "</tr>";                
            }
            ?>
        </table>
        
    </body>
</html>