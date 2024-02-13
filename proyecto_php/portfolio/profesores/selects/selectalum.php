<?php
session_start();

$query="SELECT al.IdAlumno as id, al.Nombre as nombre, al.Apellidos as apellidos FROM alumno as al
INNER JOIN `alumno-clase` as cl
ON cl.IdAlumno = al.IdAlumno
    WHERE  cl.IdClase LIKE ".$_POST['id']." AND cl.Activa=1 GROUP BY nombre";
    
        include "../../login.php";
        $con=(new login)->log($_SESSION['rolnow']);
        $result = $con->query($query);
        if (!$result) die("Fatal Error");

?>
<select class="form-select form-select-sm" id="alumsel" aria-label="Small select example">
  <option selected>Alumno</option>
<?php
        foreach ($result as $row){
            echo "<option value=\"".$row['IdAsignatura']."\">".$row['Nombre']."</option>";
        }
?>

        </select>

