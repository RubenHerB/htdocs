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
  <body id="bd" data-bs-theme="light">

  <?php include "dark.php"; ?>


  <div class="container border border-secondary rounded align-middle" style="max-width: 574px;margin-top: 100px">
  <form action="reg.php"   method="post">
              <!-- Input oculto para comprobar que el post es de esta pagina -->
              <input type="hidden" name="reg" value="reg">
              <!-- Botones nav para cambiar entre el modulo de acceso y el modulo de registro -->
              <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                  <a class="nav-link btl" id="pills-home-tab" data-toggle="pill" href="../index.php" role="tab" aria-controls="pills-home" aria-selected="false">Acceder</a>
                </li>
                <li class="nav-item text-center">
                  <a class="nav-link active btr" id="pills-profile-tab" data-toggle="pill" href="register.php" role="tab" aria-controls="pills-profile" aria-selected="true">Registrarse como tutor</a>
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


              <div class="col-12 text-center" style="margin-bottom:30px">
                <button type="submit" class="btn btn-primary">Acceder</button>
              </div>
</div>
</form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 <script src=dark.js></script>
  </body>
</html>