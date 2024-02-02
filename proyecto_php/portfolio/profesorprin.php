<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias CIFP Aviles</title>
    <link rel="stylesheet" href="../css/dark-mode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">

    <style>
        .columna{ margin-bottom: 20px;}
    </style>
  </head>

  <?php
    session_start();
    if(!isset($_SESSION) || $_SESSION==null){
        header("Location: ../index.php");
        var_dump($_SESSION["tipo"]);
        if($_SESSION["tipo"]!=0){
            header("Location: redirect.php");
        }else{
            include "login.php";
    $con=(new login)->log(1);
        }

    }
    

  ?>

  <body id="bd" data-bs-theme="light">

  <?php include "dark.php"; ?>
  
<div class="container-sm">
<h1 style="margin-top: 20px;">Panel de control</h1>
<br>
<div class="row">
  <div class="col-sm-6 col-lg-4 columna">
<div class="card h-100">
<h5 class="card-header">Profesor</h5>
    <div class="card-body">    
    <h6 class="card-subtitle mb-2 text-body-secondary">Inicia sesion en modo profesor</h6>
    <p class="card-text">Esta funcion te permite iniciar sesion para ver, registrar, editar o borrar tus incidencias de los modulos que impartes.</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="text-center">
    <input type="hidden" name="modo" value="1">
    <button type="button" class="btn btn-primary ">Iniciar sesión</button>
    </form>
    </div>
</div>
  </div>
    <?php 
    include "login.php";
    $con=(new login)->log(1);
    $query ="SELECT IdClase,Codigo,Nombre,Year,Tipo FROM clases WHERE IdTutor LIKE ".$_SESSION["id"];
    $result = $con->query($query);
    if (!$result) die("Fatal Error");
    if($result->num_rows>0){
        foreach($result as $row){
            echo <<<_END
            <div class="col-sm-6 col-lg-4 columna">
            <div class="card"">
            <h5 class="card-header">Tutor</h5>
                <div class="card-body">
                    
                    <h6 class="card-subtitle mb-2 text-body-secondary">
            _END;
            echo $row["Codigo"].".".$row["Year"];
            echo <<<_END
                    </h6>
                    <p class="card-text">Esta funcion te permite iniciar sesion como tutor de la calse 
            _END;
            echo $row["Year"]."º de ".$row["Nombre"]." ".$row["Tipo"];
            echo <<<_END
                    para ver las incidencias de los alumnos de ese modulo.</p>
                    <form action=' 
            _END;
            echo $_SERVER['PHP_SELF'];
            echo <<<_END
                    ' method="post" class="text-center">
                    <input type="hidden" name="modo" value="2">
                    <input type="hidden" name="clase" value="
                _END;
            echo $row["IdClase"];
            echo <<<_END
                    ">
                    <button type="button" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
            </div>
            </div>
            _END;
        }
    }elseif($_SESSION["rol"] ==1){
        header("Location: profesores/profesor.php");
}    
    if($_SESSION["rol"]==3){
        echo <<<_END

        <div class="col-sm-6 col-lg-4 columna">
        <div class="card h-100">
        <h5 class="card-header">Equipo administrativo</h5>
        <div class="card-body">    
        <h6 class="card-subtitle mb-2 text-body-secondary">Inicia sesion en modo equipo administrativo</h6>
        <p class="card-text">Esta funcion te permite iniciar sesion para ver, registrar, editar o borrar tus incidencias de los modulos que impartes.</p>
        <form action=" 
        _END;
        echo $_SERVER['PHP_SELF'];
        echo <<<_END
        " method="post" class="text-center">
        <input type="hidden" name="modo" value="1">
        <button type="button" class="btn btn-primary ">Iniciar sesión</button>
        </form>
        </div>
        </div>
        </div>
        _END;
    }

$con->close(); 
    ?>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src=dark.js></script>
    </body>
</html>