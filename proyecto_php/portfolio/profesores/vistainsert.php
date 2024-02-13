<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias CIFP Aviles</title>
    <link rel="stylesheet" href="../../css/dark-mode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png">
    <style>
        li{padding: 2px 10px;
        }
    </style>
</head>
<?php
    session_start(); 
    if(!isset($_SESSION)){
        header("Location: ../index.php");
        
    }else{
        if($_SESSION["tipo"]!=0){
            header("Location: redirect.php");
        }else{
            if($_SESSION["rolnow"]!=1){
                header("Location: ../redirect.php");
            }
        }

    }
?>
<body id="bd" data-bs-theme="light">
    
<?php include "../dark.php"; ?>
<form action="../profesorprin.php">
<button type="submit" class="btn btn-primary">Panel de control</button>
</form>
<div class="container border border-secondary rounded align-middle" style="margin-top: 40px">
<h3 style="margin-top: 20px;">Incidencias</h3>
<h5><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']?></h5>
<div class="d-flex justify-content-end"><form action="vista1.php"><button class="btn btn-primary type="submit">Ver incidencias</button></form></div>
<form>
<br>
<h6>Alumno</h6>
<div class="d-flex justify-content-end">
<select class="form-select form-select-sm" aria-label="Small select example">
  <option selected>Clase</option>
    <?php
    $query="SELECT clas.Nombre,clas.Tipo,clas.Year, clas.IdClase FROM clases as clas
    
    INNER JOIN asignaturas as asig
    ON clas.IdClase=asig.IdClase

    WHERE asig.IdProfesor=".$_SESSION['id'];
    
        include "../login.php";
        $con=(new login)->log($_SESSION['rolnow']);
        $result = $con->query($query);
        if (!$result) die("Fatal Error");
    ?>
</select>
<select class="form-select form-select-sm" id="asig" aria-label="Small select example" disabled>
  <option selected>Asignatura</option>
</select>
<select class="form-select form-select-sm" id="alum" aria-label="Small select example" disabled>
  <option selected>Alumno</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>
<br>
<h6>Fecha</h6>
<input
  type="datetime-local">
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src=../dark.js></script>
</html>