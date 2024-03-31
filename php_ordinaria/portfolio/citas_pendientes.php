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
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <?php
            if($_SESSION['user']['tipo']!="Medico"){
            echo "<th>Medico</th>";
            }
            ?>
            <th>Consultorio</th>
            <th colspan="3">Observaciones</th>
        </tr>
        <?php
        session_start();
        if($_SESSION['user']['tipo']=="Medico"){
            $query="SELECT c.citFecha,c.citHora ,p.pacNombre,p.pacApellidos,con.conNombre,c.CitObservaciones FROM citas AS c
            inner join pacientes as p on c.citPaciente=m.dniPac
            inner join consultorios as con on c.citConsultorio=m.idConsultorio
            WHERE c.citEstado LIKE 'Atendido' AND c.citMedico LIKE '".$_SESSION['user']['dni']."'";
        }else{
            $query="SELECT c.citFecha,c.citHora, FROM citas AS c
            inner join medicos as m on c.citMedico=m.dniMed
            inner join pacientes as p on c.citPaciente=m.dniPac
            inner join consultorios as con on c.citConsultorio=m.idConsultorio
            WHERE c.citEstado LIKE 'Atendido'";
        }
        include "login.php";
        $conn=new Login();
        $con=$conn->log($_SESSION['user']['tipo']);
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