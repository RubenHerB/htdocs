<?php
 if (isset($_POST['name'])) $name = $_POST['name'];
 else $name = "(Not entered)";
 echo <<<_END
 <html>
 <head>
 <title>Test de formulario</title>
 </head>
 <body>
 Tu nombre es: $name<br>
 <form method="post" action="Ejemplo3.php">
 ¿Cual es tu nombre?
 <input type="text" name="name">
 <input type="submit">
 </form>
 </body>
 </html>
_END;
?> 