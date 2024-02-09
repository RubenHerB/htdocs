
<table class="table table-striped">
    
<?php
$filtroextra=$_POST["filtro"];
session_start();
$query="SELECT  inci.Fecha as Fecha, incibas.Tipo as Gravedad, al.Nombre as Nombre, al.Apellidos as Apellidos, cla.Nombre as Curso, cla.Year as Yeara, asig.Nombre as Asignatura, inci.Observaciones as Observaciones 
FROM incidencia as inci 

INNER JOIN alumno as al 
ON inci.IdAlumno=al.IdAlumno


INNER JOIN incidenciasbase as incibas
ON incibas.IdIncidenciaBase = inci.TipoIncidencia

INNER JOIN `alumno-clase` as alc
on al.IdAlumno = alc.IdAlumno

INNER JOIN clases as cla
ON alc.IdClase = cla.IdClase

INNER JOIN asignaturas as asig
ON cla.IdClase LIKE asig.IdClase

WHERE inci.IdProfesor LIKE '".$_SESSION['id']."' $filtroextra";
    include "../login.php";
    $con=(new login)->log($_SESSION['rolnow']);
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
    if($result->num_rows!=0){
        echo <<<_END
        <thead>
        <tr>
        <th>Fecha</th>
        <th>Gravedad</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Curso</th>
        <th>Año</th>
        <th>Asignatura</th>
        <th>Incidencia</th>
        <th>Observaciones</th>
        _END;
        if($_SESSION['rolnow']==1){
            echo "<th>Gestion</th>";
        }
        echo "
    </tr>
    </thead>
    <tbody>";
    if($_SESSION['rolnow']==1){
        foreach($result as $row){
            echo "<tr>";
            foreach($row as $r){
                echo "<td>$r</td>";
            }
            echo "<td><button>
            </button></td></tr>";
    }
    }else{
        foreach($result as $row){
            echo "<tr>";
            foreach($row as $r){
                echo "<td>$r</td>";
            }
            echo "</tr>";
        }
        }

    }


?>
    </tbody>
</table>