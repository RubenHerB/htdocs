<html>
    <head>
    <title>Test de formulario</title>
    </head>
    <body>
    <?php
   if(isset($_POST['a']) && isset($_POST['B'])){
    echo "La suma de $a + $b es ",$a+$b;
   }else{
   echo <<<_END
    <form method="post" action="Practica1U4_1_b.php">
    A: 
    <input type="text" name="a"> 
    B: 
    <input type="text" name="b"> 
    <input type="submit">
    </form>
    </body>
    </html>
   _END;
   }
?>
   