<?php
if (isset($_POST['name']))
echo" Tu nombre es: ".$_POST['name']."<br>";
else
echo <<<_END
 <html>
 <head>
 <title>Test de formulario</title>
 </head>
 <body>
 <form method="post" action="Ejemplo2.php">
 ¿Cual es tu nombre?
 <input type="text" name="name">
 <input type="submit">
 </form>
 </body>
 </html>
 _END;
 ?>