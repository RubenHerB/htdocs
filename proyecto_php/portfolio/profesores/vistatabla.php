
<table class="table table-striped">
    
<?php
session_start();
$filtroextra=$_POST["filtro"];
$prof="";
if($_SESSION["rolnow"] ==1){
    $prof="WHERE inci.IdProfesor LIKE '".$_SESSION['id']."'";
}elseif($_SESSION["rolnow"] ==2){
    $prof="WHERE cla.IdTutor LIKE '".$_SESSION['id']."'";
}
if($filtroextra!=""){
    if($prof!=""){
        $filtroextra =$prof." AND ".$filtroextra;
    }else{
        $filtroextra = " WHERE ".$filtroextra;
    }
}else if($prof!=""){
    $filtroextra = $prof;
}

$query="SELECT inci.IdIncidencia as id, inci.Fecha as Fecha, incibas.Tipo as Gravedad, al.Nombre as Nombre, al.Apellidos as Apellidos, cla.Nombre as Curso, cla.Year as Yeara, asig.Nombre as Asignatura,incibas.Titulo as Tipo, inci.Observaciones as Observaciones 
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
ON inci.Asignatura LIKE asig.IdAsignatura ".$filtroextra." order by id desc";

    include "../login.php";
    $con=(new login)->log($_SESSION['rolnow']);
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
    if($result->num_rows!=0){
        echo <<<_END
        <thead>
        <tr>
        <th>Id</th>
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
        if($_SESSION['rolnow']==1){
            echo "<th>Gestion</th>";
        }
        echo "
    </tr>
    </thead>
    <tbody>";
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
            echo "<td>
            <form method=\"post\" action=\"vistaupdate.php\">
            <input type=\"hidden\" name=\"id\" value=\"".$row['id']."\">
            <button type=\"submit\">
            Editar
            </button></form>
            <button onclick=\"borrar(".$row['id'].")\">Borrar
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