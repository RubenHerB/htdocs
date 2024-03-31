<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$paciente="";
$fecha="";
$hora="";
$medico="";
$consultorio="";
$errorlog="";
if(isset($_POST["nuevac"])){
    $paciente=$_POST["paciente"];
    $fecha=$_POST["fecha"];
    $hora=$_POST["hora"];
    $medico=$_POST["medico"];
    $consultorio=$_POST["consultorio"];

if($fecha==date('Y-m-d')&& $hora<date('H:i')){
    $errorlog="hora";
}else{
$errorlog="confirmacion";
}
}

?>
<a href="inicio.php">← Volver al menu</a>
<h1 style="background-color:yellow; text-align:center;padding:15px">ASDI VIRTUAL</h1>
<?php
            if($errorlog=="hora"){
                echo "<p style=\"color:red\">La hora y fecha seleccionadas ya han pasado, por favor, selecciona una hora o una fecha diferente.</p>";
            }elseif($errorlog=="confirmacion"){
                echo "<p style=\"color:green\">Se ha creado una cita para el paciente con DNI $paciente en $consultorio, para el $fecha a las $hora</p>";
                $paciente="";
                $fecha="";
                $hora="";
                $medico="";
                $consultorio="";
                $errorlog="";
            }
            ?>
<div style="width:20%; text-align:center;margin-left:40%">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3 style="background-color:red; text-align:center;padding:15px;color:white">ASIGNAR CITA</h3>
            Paciente: <select name="paciente" required>
                <?php
                session_start();
                    include "login.php";
                    $conn=new Login();
                    $con=$conn->log($_SESSION['user']['tipo']);
                    $query="SELECT dniPac, pacNombres, pacApellidos
                    FROM pacientes order by pacApellidos ASC, pacNombres ";
                    $result= $con->query($query);
                    if (!$result) die("Fatal Error");
                    foreach ($result as $row){
                        echo "<option value=\"".$row["dniPac"]."\" ".
                        ($row["dniPac"]==$paciente?"selected":"").">".
                        $row["pacNombres"]." ".$row["pacApellidos"]."</option>";
                    }
                ?>
                </select><br>
            Fecha: <input type="date" name="fecha" min='<?php echo date('Y-m-d'); ?>' value="<?php echo $fecha; ?>" required><br>
            Hora: <input type="time" name="hora" value="<?php echo $hora; ?>" required><br>
            Medico: <select name="medico" required>
                <?php
            $query="SELECT dniMed, medNombres, medApellidos, medEspecialidad
                    FROM medicos order by medEspecialidad ASC,medApellidos, medNombres ";
                    $result= $con->query($query);
                    if (!$result) die("Fatal Error");
                    foreach ($result as $row){
                        echo "<option value=\"".$row["dniMed"]."\" ".
                        ($row["dniMed"]==$medico?"selected":"").">".
                        $row["medEspecialidad"]."-".$row["medNombres"]." ".$row["medApellidos"]."</option>";
                    }
                    ?>
                </select><br>
            Consultorio: <select name="consultorio" required>
            <?php
            $query="SELECT * FROM consultorios order by conNombre ASC";
                    $result= $con->query($query);
                    if (!$result) die("Fatal Error");
                    foreach ($result as $row){
                        echo "<option value=\"".$row["idConsultorio"]."\" ".
                        ($row["idConsultorio"]==$consultorio?"selected":"").">".
                        $row["conNombre"]."</option>";
                    }
                    ?>
                </select>
            <div style="background-color:red; text-align:center;padding:5px 15px;margin-top:5px">
                <input type="submit" name="nuevac" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>