
<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
$query = 
"SELECT * AS fuente
FROM alumno
WHERE IdAlumno = 'luis@p.es'
UNION
SELECT * AS fuente
FROM tabla2
WHERE IdProfesor = 'luis@p.es'
UNION
SELECT * AS fuente
FROM tabla3
WHERE id = 'luis@p.es';"
;
$result = $connection->query($query);
 if (!$result) die("Fatal Error");

var_dump($result);
 


?>