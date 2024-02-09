
<table class="table table-striped">
    
<?php
$filtroextra=$_POST["filtro"];
session_start();
$query="SELECT  inci.Fecha as Fecha, bas.Tipo as Gravedad, al.Nombre as Nombre, al.Apellidos as Apellidos, cla.Nombre as Curso, cla.Year as Yeara, asig.Nombre as Asignatura, ini.Observaciones as Observaciones 
FROM incidencia as inci 

FULL OUTER JOIN alumno as al 
ON IdAlumno.incib=al.IdAlumno


FULL OUTER JOIN incidenciasbase as incib
bas.IdIncidenciaBase = incib.TipoIncidencia

FULL OUTER JOIN asignaturas as asig


FULL OUTER JOIN `alumno-clase` as alc
on al.IdAlumno = alc.IdAlumno

FULL OUTER JOIN clases as cla



AND alc.IdClase LIKE cla.IdClase
AND cla.IdClase LIKE asig.IdClase
AND inci.IdProfesor LIKE '".$_SESSION['id']."' $filtroextra
";
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
        if($rolnow==1){
            echo "<th>Gestion</th>";
        }
        echo "
    </tr>
    </thead>
    <tbody>";
    if($rolnow==1){
        foreach($result as $row){
            foreach($row as $r){
                echo "<tr>$r</tr>";
            }
            echo "<button>
            </button>";
        }
    }else{
        foreach($result as $row){
            foreach($row as $r){
                echo "<tr>$r</tr>";
            }
        }
        }

    }


?>
    </tbody>
</table>