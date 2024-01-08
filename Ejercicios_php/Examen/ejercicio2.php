<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oposicion</title>
    <meta name="author" content="Ruben Hernando Bango">
    <style>
        .blue{background-color: lightblue;}
        .orange{background-color:orange;}
        table,td,th{border-collapse: collapse;}
        td,th{width:150px;padding: 4px 0 4px 0}
        .tabla-datos{border:1px solid black}
    </style>
</head>
    <?php 
        session_start(); 
    if(!isset($_SESSION)) header("Location: ejercicio1.php");
    ?>
    <body>
        <table>
            <tr>
                <td class="orange">PROFESOR:</td>
                <td class="orange"><?php echo $_SESSION['dni'];?></td>
                <td class="blue">NOMBRE:</td>
                <td class="blue"><?php echo $_SESSION['nombre'];?></td>
            </tr>
        </table>
        <br>
        <table class="tabla-datos">
            <tr>
                <th class="tabla-datos">codigocurso</th>
                <th class="tabla-datos">nombrecurso</th>
                <th class="tabla-datos">maxalumnos</th>
                <th class="tabla-datos">fechaini</th>
                <th class="tabla-datos">fechafin</th>
                <th class="tabla-datos">numhoras</th>
                <th class="tabla-datos">profesor</th>
            </tr>
            <?php
                $s=0;
                $connection = new mysqli('localhost', 'root','', 'OPOSICION');
                if ($connection->connect_error) die("Fatal Error");
                $query = "SELECT * FROM curso WHERE profesor like '".$_SESSION['dni']."'";
                $result = $connection->query($query);
                if (!$result) die("Fatal Error");
                $n=$result->num_rows;
                for($i=0; $i<$n; $i++){
                    $result->data_seek($i); 
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $s+=$row['numhoras'];
                    echo "<tr>";
                    foreach($row as $r){
                        echo "<td class=\"tabla-datos\">$r</td>";
                    }
                    echo "<tr/>";
                }
            ?>
        </table>
        <br/>
        <table>
            <tr>
                <td class="blue" style="width:304px">Total horas impartidas:</td>
                <td style="width:456px"></td>
                <td class="blue">
                    <?php echo $s; ?></td>
            </tr>
        </table>
    </body>
</html>