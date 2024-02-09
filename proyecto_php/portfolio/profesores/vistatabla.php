
<table class="table table-striped">
    
<?php
$filtroextra=$_POST["filtro"];

$query="SELECT  Fecha.in as Fecha, Tipo.bas as Gravedad, Nombre.al as Nombre, Apellidos.al as Apellidos, Nombre.cla as Curso, Year.cla as Yeara, Nombre.asig as Asignatura  Observaciones.inci as Observaciones 
FROM incidencias as in 
INNER JOIN alumno as al 
INNER JOIN incidenciasbase as bas
INNER JOIN incidencia as inci
INNER JOIN asignaturas as asig
INNER JOIN alumno-clase as alc
INNER JOIN clases as cla
WHERE IdIncidenciaBase.bas LIKE TipoIncidencia.inci 
AND IdAlumno.inci LIKE IdAlumno.al
AND IdAlumno.al LIKE IdAlumno.alc
AND IdClase.alc LIKE IdClase.cla
AND IdClase.cla LIKE IdClase.asig
AND IdProfesor.in LIKE '".$_SESSION['id']."' $filtroextra
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

        session_start();
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