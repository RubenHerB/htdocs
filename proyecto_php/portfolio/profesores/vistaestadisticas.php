
<table class="table table-striped">
    
<?php
session_start();
$filtroextra=$_POST["filtro"];


$query="SELECT cla.Nombre as clase, count(inci.IdIncidencia) as cuenta
FROM incidencia as inci 

INNER JOIN alumno as al 
ON inci.IdAlumno=al.IdAlumno

INNER JOIN incidenciasbase as incibas 
ON incibas.IdIncidenciaBase = inci.TipoIncidencia 

INNER JOIN `alumno-clase` as alc 
ON al.IdAlumno = alc.IdAlumno 

INNER JOIN clases as cla 
ON alc.IdClase = cla.IdClase 

INNER JOIN asignaturas as asig 
ON inci.Asignatura LIKE asig.IdAsignatura 
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
    if($_SESSION['rolnow']==1){
        foreach($result as $row){
            echo "<tr    id=\"".$row['id']."\">";
            foreach($row as $d=>$r){
                if($d!="Observaciones"){
                echo "<td>$r</td>";
            }else{
                echo "<td class=\"overflow-auto\" style=\"max-width:20vw\">$r</td>";
            }
        }
            echo "<td><button onclick=\"editar(".$row['id'].")\">Editar
            </button><button onclick=\"borrar(".$row['id'].")\">Borrar
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

    }else{
        echo <<<_END
        <div class="alert alert-secondary" role="alert" style="margin-top:16px">
    Sin incidencias
    </div>
    _END;
    }


?>
    </tbody>
</table>