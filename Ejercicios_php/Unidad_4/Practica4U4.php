<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookies</title>
</head>
<body>
    <?php
    if(isset($_COOKIE('color'))){
        echo '<div style="background-color:',$_COOKIE('color'),'">';
    }else{
        echo '<div style="background-color:white">';
    }
    ?>
        <form method="post" action="Practica4U4_2.php">
            <input type="radio" name="col" value="red">
            <label for="html">Rojo</label><br>
            <input type="radio" name="col" value="red">
            <label for="html">Azul</label><br>
            <input type="radio" name="col" value="green">
            <label for="html">Verde</label><br>
    </div>
</body>
</html>