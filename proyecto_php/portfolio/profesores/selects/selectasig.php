<?php
session_start();

$query="SELECT IdAsignatura, Nombre FROM asignaturas
    WHERE IdProfesor=".$_SESSION['id']." AND IdClase LIKE ".$_POST['id']." GROUP BY Nombre";
    
        include "../../login.php";
        $con=(new login)->log($_SESSION['rolnow']);
        $result = $con->query($query);
        if (!$result) die("Fatal Error");

?>
<select class="form-select form-select-sm" id="asigselECT" name="asigselECT" aria-label="Small select example">
  <option selected>Asignatura</option>
<?php
        foreach ($result as $row){
            echo "<option value=\"".$row['IdAsignatura']."\">".$row['Nombre']."</option>";
        }
?>

        </select>
        <script>
            document.getElementById("asigselECT").addEventListener("change", (event) => {
    console.log(document.getElementById("asigselECT").value);
    if(document.getElementById("asigselECT").value!="Asignatura"){
    ajaxalum(document.getElementById("asigselECT").value);
}else{
        document.getElementById("alum").innerHTML="<select class=\"form-select form-select-sm\" id=\"alumsel\" aria-label=\"Small select example\" disabled><option selected>Alumno</option></select>";
    } 
});
<script>




