<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookies</title>
</head>

    <?php
    if(isset($_COOKIE['color'])){
        echo '<body style="background-color:',$_COOKIE['color'],'">';
    }else{
        echo '<body style="background-color:white">';
    }
    ?>
        <form method="post" action="Practica4U4_2.php">
            <input type="radio" name="col" value="red">
            <label for="html">Rojo</label><br>
            <input type="radio" name="col" value="#4287f5">
            <label for="html">Azul</label><br>
            <input type="radio" name="col" value="green">
            <label for="html">Verde</label><br>
            <input type="submit" value="Crear la coockie"/>

</body>
</html>