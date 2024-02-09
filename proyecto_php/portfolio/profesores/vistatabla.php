
<table class="table table-striped">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Gravedad</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Curso</th>
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

$query="SELECT  Fecha.in as Fecha, Tipo.bas as Gravedad, Nombre.al as Nombre, Apellidos.al as Apellidos, Nombre.cla as Curso Year.cla as Yeara,  Observaciones.in as Observaciones 
FROM incidencias as in 
INNER JOIN alumno as al 
INNER JOIN incidenciasbase as bas
INNER JOIN incidencia as in
"



?>
    </tbody>
</table>