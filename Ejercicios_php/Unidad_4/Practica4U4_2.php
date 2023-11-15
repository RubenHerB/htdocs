<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookies</title>
</head>
<body>
<?php
    if(isset($_POST['col'])){
        setcookie('color', $_POST['col'], time()+600, '/', '127.0.0.1', FALSE, FALSE);
        echo "Se crea la coockie";
    }else{
        echo "La coockie no se ha creado";
    }
?>
<br>
<a href="Practica4U4.php">Ir a la otra web</a>
</body>
</html>