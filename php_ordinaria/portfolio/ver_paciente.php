<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
            padding:10px;
            margin-left:auto;
            margin-right:auto;
        }
        td,th{border: 1px solid black; padding 10px}
        th{background-color:lightgreen}
    </style>
</head>
<body>
<a href="inicio.php">← Volver al menu</a>
    <h1 style="background-color:yellow; text-align:center;padding:15px; width:30%; margin-left:35%">LISTADO DE PACIENTES</h1>
    <table>
        <tr>
            <th>Identificacion</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fecha de nacimiento</th>
            <th>Sexo</th>
        </tr>
        <?php
        session_start();
        $extra="";
        if($_SESSION['user']['tipo']=="Medico"){
            $extra="    INNER JOIN citas AS c ON dniPac=citPaciente WHERE c.citMedico LIKE '".$_SESSION['user']['dni']."'";
        }
        include "login.php";
        $conn=new Login();
        $con=$conn->log($_SESSION['user']['tipo']);
        $query="SELECT p.* FROM pacientes AS p $extra";
        $result= $con->query($query);
        if (!$result) die("Fatal Error");

        foreach($result as $r){
            echo "<tr>";
            foreach($r as $t){
                echo "<td>$t</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>