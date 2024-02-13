<?php
session_start();

$query="SELECT IdAsignatura, Nombre FROM asignaturas WHERE 
    WHERE asig.IdProfesor=".$_SESSION['id']." AND IdClase LIKE ".$_POST['id']." GROUP BY Nombre";
    
        include "../login.php";
        $con=(new login)->log($_SESSION['rolnow']);
        $result = $con->query($query);
        if (!$result) die("Fatal Error");
        foreach ($result as $row){
            echo "<option value=\"".$row['id']."\">".$row['nombre']." ".$row['tipo']." ".$row['year']."º</option>";
        }







<select class="form-select form-select-sm" id="asigsel" aria-label="Small select example" disabled>
  <option selected>Asignatura</option>
</select>