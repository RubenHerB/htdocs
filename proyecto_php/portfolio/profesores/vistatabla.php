<table class="table">
    <tr>
        <th>Fecha</th>
        <th>Gravedad</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Curso</th>
        <th>Incidencia</th>
        <th>Observaciones</th>
    </tr>
<?php
$query="SELECT Nombre.al as Nombre, Apellidos.al as Apellidos, Nombre.cla as Curso Year.cla as Year  Fecha.in as Fecha, Observaciones.in as Observaciones FROM incidencias as in INNER JOIN alumno as al"



?>
</table>