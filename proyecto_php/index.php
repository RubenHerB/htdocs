<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias CIFP Aviles</title>
    <link rel="stylesheet" href="css/dark-mode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
  </head>

  <?php
    $valid="is-valid";
    $invalid="is-invalid";
    $validmail="";
    $validpass="";
    $errorusu="";
    $errorpass="";
  if (isset($_POST) && isset($_POST["login"])){
    var_dump($_POST);
    $usu=$_POST["mail"];
    $pass=$_POST["pass"];
    if($usu!="" && $pass!=""){
    if (filter_var($usu, FILTER_VALIDATE_EMAIL)) {
      $validmail=$valid;
      include "portfolio/login.php";
      $conn=new login();
      $con=$conn->log(-1);
      $query = 
      "SELECT * 
      FROM alumno
      WHERE Mail = '$usu'
      UNION
      SELECT * 
      FROM profesor
      WHERE Mail = '$usu'
      UNION
      SELECT *
      FROM tutorlegal
      WHERE Mail = '$usu'";
      $result = $con->query($query);
      if (!$result) die("Fatal Error");
      
      if($result->num_rows==0){
        $validmail=$invalid;
        $errorusu="El email introducido no se corresponde a ningun usuario conectado";
      }else{
        $result->data_seek(0);
        $r=$result->fetch_array(MYSQLI_ASSOC);
        if(password_verify($pass, $r['Contra'])){
          
          
          if(isset($r['IdProfesor'])){
            session_id("P".$r['IdProfesor']);
            $_SESSION=["tipo"=>0,"id"=>$r['IdProfesor'],"nombre"=>$r['Nombre'],"apellidos"=>$r['Apellidos'],"rol"=>$r['rol'],"rolnow"=>-1];
            header("Location: /portfolio/profesorprin.php");
          }elseif(isset($r['IdAlumno'])){
            session_id("A".$r['IdAlumno']);
            $_SESSION=["tipo"=>1,"id"=>$r['IdAlumno'],"nombre"=>$r['Nombre'],"apellidos"=>$r['Apellidos'],"lastlogtime"=>$r['LastLog']];
            header("Location: /portfolio/alumno.php");
          }else{
            session_id("T".$r['IdTutor']);
            $_SESSION=["tipo"=>1,"id"=>$r['IdTutor'],"nombre"=>$r['Nombre'],"apellidos"=>$r['Apellidos'],"lastlogtime"=>$r['LastLog'],"idAlumno"=>-1];
            if($r['Confirm']==-1){
            header("Location: /portfolio/tutor.php");
          }else{
            header("Location: /portfolio/confirmacion.php");
          }
          }
          session_start();
            var_dump($_SESSION);
            var_dump(session_id());
        }else{
          $validpass=$invalid;
      $errorpass="Contraseña incorrecta";
        }
      }
  }else{
    $validmail=$invalid;
    $errorusu="El formato de correo no es correcto";
  }}else{
    if($usu==""){
      $validmail=$invalid;
      $errorusu="Este campo no puede estar vacio";
    }
    if($pass==""){
      $validpass=$invalid;
      $errorpass="Este campo no puede estar vacio";
    }
  }
  }else{
    $usu="";
  }
  ?>

  <body id="bd" data-bs-theme="light">

  <?php include "portfolio/dark.php"; ?>


  <div class="container border border-secondary rounded align-middle" style="max-width: 574px;margin-top: 40px">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <!-- Input oculto para comprobar que el post es de esta pagina -->
              <input type="hidden" name="login" value="login">
              <!-- Botones nav para cambiar entre el modulo de acceso y el modulo de registro -->
              <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                  <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="index.php" role="tab" aria-controls="pills-home" aria-selected="true">Acceder</a>
                </li>
                <li class="nav-item text-center">
                  <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="portfolio/register.php" role="tab" aria-controls="pills-profile" aria-selected="false">Registrarse como tutor</a>
                </li>
              
                <!-- Campo de insercion del correo del usuario -->
              </ul>
              <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Direccion de correo electronico</label>
              <input type="email" name="mail" class="form-control <?php echo $validmail; ?>" id="exampleFormControlInput1" placeholder="ejemplo@direccion.com" value="<?php echo $usu; ?>">
              <div class="invalid-feedback">
                <?php echo $errorusu; ?>
              </div>
            </div>

              <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
              <input type="password" name="pass" id="inputPassword6" class="form-control <?php echo $validpass; ?>" aria-describedby="passwordHelpInline">
              <div class="invalid-feedback">
                <?php echo $errorpass; ?>
              </div>
              </div>

              <div class="col-12 text-center" style="margin-bottom:30px">
                <button type="submit" class="btn btn-primary">Acceder</button>
              </div>
</div>
</form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src=portfolio/dark.js></script>
    </body>
</html>