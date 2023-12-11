<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

</head>
<body>
    <?php 
    if(isset($_POST['usuario'])) {
        $usu=$_POST["usuario"];
        $pass=$_POST["clave"];
    }else{
        $usu="";
    }
    ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
Usuario: <input type="text" name="usuario" value="<?php echo $usu ?>">
Clave: <input type="password" name="clave" ">
<input type="submit">
</form>
</body>
</html>