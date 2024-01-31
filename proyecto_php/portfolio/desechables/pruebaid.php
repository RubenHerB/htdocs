
<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
$query = 
"SELECT 'tabla1' AS fuente
FROM tabla1
WHERE id = 'luis@p.es'
UNION
SELECT 'tabla2' AS fuente
FROM tabla2
WHERE id = 'luis@p.es'
UNION
SELECT 'tabla3' AS fuente
FROM tabla3
WHERE id = 'luis@p.es';"
;
$result = $connection->query($query);
 if (!$result) die("Fatal Error");

var_dump($result);
 


?>