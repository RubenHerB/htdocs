<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sesiones</title>
</head>
<body>
    <?php
    if(isset($_POST['user'])&&isset($_POST['password'])){
      session_start();
      $_SESSION=['u'=>$_POST['user'],'p'=>$_POST['password']];
      header("Location: confirmar.php");
    }else{
      echo "<p style=\"color:red\">Introduce todos los datos</p>";
    }
    ?>
    <form method="post" action="index.php">
      Usuario: 
      <input type="text" name="user">
      <br/>
      Contraseña: 
      <input type="passwrd" name="pasword">
      <br/>
      <input type="submit">
</body>
</html>