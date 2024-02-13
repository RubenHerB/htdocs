<?php
session_start();

$query="SELECT IdAsignatura, Nombre FROM asignaturas
    WHERE IdProfesor=".$_SESSION['id']." AND IdClase LIKE ".$_POST['id']." GROUP BY Nombre";
    
        include "../../login.php";
        $con=(new login)->log($_SESSION['rolnow']);
        $result = $con->query($query);
        if (!$result) die("Fatal Error");

?>
<select class="form-select form-select-sm" id="asigsel" name="asignatura" aria-label="Small select example">
  <option selected>Asignatura</option>
<?php
        foreach ($result as $row){
            echo "<option value=\"".$row['IdAsignatura']."\">".$row['Nombre']."</option>";
        }
?>

        </select>




