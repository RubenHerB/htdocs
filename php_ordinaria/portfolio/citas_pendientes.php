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
            margin-left:auto;
            margin-right:auto;
        }
        td,th{border: 1px solid black; padding 15px}
        th{background-color:lightgreen}
    </style>
</head>
<body>
<a href="inicio.php">← Volver al menu</a>
    <h1 style="background-color:yellow; text-align:center;padding:15px; width:30%; margin-left:35%">LISTADO DE PACIENTES</h1>
    <?php
    var_dump($_POST);
    if(isset($_POST['citaatendida'])){
        echo "<p style=\"color:green\">Se ha atendido la cita</p>";
    }
    ?>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Consultorio</th>
            <th>Observaciones</th>
            <th>Atender</th>
        </tr>
        <?php
        session_start();
        $query="SELECT c.idCita as id, c.citFecha as fecha,c.citHora as hora,p.pacNombres as nombrep,p.pacApellidos as apep,con.conNombre as nombrec,c.CitObservaciones as observaciones
        FROM citas AS c
        inner join pacientes as p on c.citPaciente=p.dniPac
        inner join consultorios as con on c.citConsultorio=con.idConsultorio
        WHERE c.citEstado LIKE 'Asignado' AND c.citMedico LIKE '".$_SESSION['user']['dni']."'";
        include "login.php";
        $conn=new Login();
        $con=$conn->log($_SESSION['user']['tipo']);
        $result= $con->query($query);
        if (!$result) die("Fatal Error");

        foreach($result as $r){
            echo "<tr><td>".$r["fecha"]."</td><td>".$r["hora"]."</td><td>".$r["nombrep"]." ".$r["apep"]."</td><td>".$r["nombrec"]."</td><td>".$r["observaciones"]."</td><td>
            <form action=\"atender_cita.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$r["id"]."\"><input type=\"submit\" name=\"atenderc\" value=\"Atender cita\"></form></td></tr>";

        }
        ?>
    </table>
</body>
</html>
