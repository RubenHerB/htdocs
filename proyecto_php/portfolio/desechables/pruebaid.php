
<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
$query = 
"SELECT IdAlumno AS fuente
FROM alumno
WHERE IdAlumno = 'luis@p.es'
UNION
SELECT IdProfesor AS fuente
FROM profesor
WHERE IdProfesor = 'luis@p.es'
UNION
SELECT IdTutor AS fuente
FROM tutor
WHERE IdTutor = 'luis@p.es';"
;
$result = $connection->query($query);
 if (!$result) die("Fatal Error");

var_dump($result);
 


?>