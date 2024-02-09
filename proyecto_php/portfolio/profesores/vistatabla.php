
<table class="table table-striped">
    
<?php
$filtroextra=$_POST["filtro"];
session_start();
$query="SELECT  Fecha.inci as Fecha, Tipo.bas as Gravedad, Nombre.al as Nombre, Apellidos.al as Apellidos, Nombre.cla as Curso, Year.cla as Yeara, Nombre.asig as Asignatura, Observaciones.inci as Observaciones 
FROM incidencia as inci 
FULL OUTER JOIN alumno as al 
FULL OUTER JOIN incidenciasbase as bas
FULL OUTER JOIN incidenciasbase as incib
FULL OUTER JOIN asignaturas as asig
FULL OUTER JOIN `alumno-clase` as alc
FULL OUTER JOIN clases as cla
WHERE IdIncidenciaBase.bas LIKE TipoIncidencia.incib 
AND IdAlumno.incib LIKE IdAlumno.al
AND IdAlumno.al LIKE IdAlumno.alc
AND IdClase.alc LIKE IdClase.cla
AND IdClase.cla LIKE IdClase.asig
AND IdProfesor.inci LIKE '".$_SESSION['id']."' $filtroextra
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