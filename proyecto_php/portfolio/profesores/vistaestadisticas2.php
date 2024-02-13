
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
        $filtroextra=$prof.$filtroextra;

var_dump($filtroextra);
$query="SELECT MAX(contador) AS maximo_contador
FROM (
    SELECT COUNT(*) AS contador
    FROM incidencia as inc

    Inner JOIN clases as cl
    on inc.IdClase = cl.IdClase
    GROUP BY cl.Seccion
    
) AS conteos";


include "../login.php";
$con=(new login)->log($_SESSION['rolnow']);
$result = $con->query($query);
$result->data_seek(0);
$maxin=$result->fetch_assoc()['maximo_contador'];

$query="SELECT  cla.Seccion as dep, count(inci.IdIncidencia) as cuenta 
FROM incidencia as inci 

INNER JOIN clases as cla 
ON inci.IdClase=cla.IdClase

INNER JOIN profesor as prof 
ON prof.IdProfesor LIKE cla.IdTutor 

INNER JOIN incidenciasbase as incibas 
ON incibas.IdIncidenciaBase = inci.TipoIncidencia 

INNER JOIN `alumno-clase` as alcl
ON cla.IdClase = alcl.IdClase

$filtroextra

GROUP BY cla.Seccion
ORDER BY cuenta  ".$_POST['orden'];
// var_dump($query);
    
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
        // var_dump($query);
        // var_dump($_SESSION);
        echo <<<_END
        <thead>
        <tr>
        <th>Departamento</th>
        <th>Incidencias</th>
        <th>Grafica</th>
        </tr>
        </thead>
        <tbody>
    _END;
    
      foreach($result as $row){
        echo "<tr>";
        echo "<td>".$row['dep']."</td>";
        echo "<td>".$row['cuenta']."</td>";
        echo "<td><div style=\"height:20px;background-color:red;width:".(200*($row['cuenta'])/$maxin)."px\"></div></td>";
      }


?>
    </tbody>
</table>