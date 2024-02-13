
<table class="table table-striped">
    
<?php
session_start();
$filtroextra=$_POST["filtro"];
$prof="";
if($_SESSION["rolnow"]==2){
        $prof="WHERE cla.IdTutor LIKE '".$_SESSION['id']."'";
    }
    if($filtroextra!=""){
        if($prof!=""){
            $filtroextra = " AND ".$filtroextra;
        }else{
            $filtroextra = " WHERE ".$filtroextra;
        }
    }


$query="SELECT MAX(contador) AS maximo_contador
FROM (
    SELECT COUNT(*) AS contador
    FROM incidencia
    GROUP BY IdClase
) AS conteos";


include "../login.php";
$con=(new login)->log($_SESSION['rolnow']);
$result = $con->query($query);
$result->data_seek(0);
$maxin=$result->fetch_assoc()['maximo_contador'];

$query="SELECT cla.Nombre as clase,cla.Year as year,cla.Tipo as tipo , cla.Seccion as dep, count(inci.IdIncidencia) as cuenta,  prof.Nombre as nombre, prof.Apellidos as apellidos 
FROM incidencia as inci 

INNER JOIN clases as cla 
ON inci.IdClase=cla.IdClase

INNER JOIN profesor as prof 
ON prof.IdProfesor LIKE cla.IdTutor 

INNER JOIN incidenciasbase as incibas 
ON incibas.IdIncidenciaBase = inci.TipoIncidencia 

GROUP BY inci.IdClase
$filtroextra";

    
    $result = $con->query($query);
    if (!$result) die("Fatal Error");

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
        echo "<td>".$row['clase']." ".$row['year']."º ".$row['tipo']."</td>";
        echo "<td>".$row['dep']."</td>";
        echo "<td>".$row['cuenta']."</td>";
        echo "<td>".$row['nombre']." ".$row['apellidos']."</td>";
        echo "<td><div style=\"height:20px;background-color:red;width:".(200*($row['cuenta'])/$maxin)."px\"></div></td>";
      }


?>
    </tbody>
</table>