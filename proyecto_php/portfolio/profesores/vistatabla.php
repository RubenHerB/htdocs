
<table class="table table-striped">
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
        <?php
        session_start();
        if($rolnow==1){
            echo "<th>Gestion</th>";
        }
        ?>
    </tr>
    </thead>
    <tbody>
<?php

$query="SELECT  Fecha.in as Fecha, Tipo.bas as Gravedad, Nombre.al as Nombre, Apellidos.al as Apellidos, Nombre.cla as Curso, Year.cla as Yeara, Nombre.asig as Asignatura  Observaciones.inci as Observaciones 
FROM incidencias as in 
INNER JOIN alumno as al 
INNER JOIN incidenciasbase as bas
INNER JOIN incidencia as inci
INNER JOIN asignaturas as asig
INNER JOIN alumno-clase as alc
INNER JOIN clases as cla
WHERE IdIncidenciaBase.bas LIKE TipoIncidencia.inci 
AND 
"



?>
    </tbody>
</table>