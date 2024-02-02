<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias CIFP Aviles</title>
    <link rel="stylesheet" href="../css/dark-mode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
  </head>

  <?php
    session_start();
    if(!isset($_SESSION) || $_SESSION==null){
        header("Location: ../index.php");
        var_dump($_SESSION["tipo"]);
        if($_SESSION["tipo"]!=0){
            header("Location: redirect.php");
        }

    }
      

  ?>

  <body id="bd" data-bs-theme="light">

  <?php include "dark.php"; ?>
<div class="container-sm">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Profesor</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Inicia sesion en modo profesor</h6>
    <p class="card-text">Esta funcion te permite iniciar sesion para ver, registrar, editar o borrar tus incidencias de los modulos que impartes.</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="modo" value="1">
    <button type="button" class="btn btn-primary">Iniciar sesión</button>
    </form>
  </div>
</div>
    <?php 
    include "login.php";
    $con=(new login)->log(1);
    $query ="SELECT IdClase FROM clases WHERE IdTutor=";
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
    if($_SESSION["rol"]==1){
        header("Location: profesores/profesor.php");
    }elseif($_SESSION["rol"]==3){
        echo <<<_END
        
        _END;
    }
    ?>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src=dark.js></script>
    </body>
</html>