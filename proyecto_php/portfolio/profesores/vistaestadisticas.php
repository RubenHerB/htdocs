
<table class="table table-striped">
    
<?php
session_start();
$filtroextra=$_POST["filtro"];


$query="SELECT cla.Nombre as clase,cla.Year as year,cla.Tipo as tipo , cla.Seccion, count(inci.IdIncidencia) as cuenta, max(count(inci.IdIncidencia)) as maximo, prof.Nombre as nombre, prof.Apellidos as apellidos 
FROM incidencia as inci 

INNER JOIN clases as cla 
ON inci.IdClase=cla.IdClase

INNER JOIN profesor as prof 
ON prof.IdProfesor LIKE cla.IdTutor 

GROUP BY inci.IdClase
$filtroextra";

    include "../login.php";
    $con=(new login)->log($_SESSION['rolnow']);
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
    if($result->num_rows!=0){
        echo <<<_END
        <thead>
        <tr>
        <th>Clase</th>
        <th>Departamento</th>
        <th>Incidencias</th>
        <th>Tutor</th>
        <th>Grafica</th>
        </tr>
        </thead>
        <tbody>
    _END;
    
      foreach($result as $row){
        echo "<tr>";
        echo "<td>".$row
      }


?>
    </tbody>
</table>