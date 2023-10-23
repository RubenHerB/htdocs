

 <html>
 <head>
 <title>Test de formulario</title>
 </head>
 <body>

 <form method="post" action="Ejemplo3.php">
 ¿Cual es tu nombre?
 <input type="text" name="name">
 <input type="submit">
 </form>
 <?php
 if (isset($_POST['name'])) $name = $_POST['name'];
 else $name = "(Not entered)";
 echo"Tu nombre es: $name<br>";
 ?> 
 </body>
 </html>

