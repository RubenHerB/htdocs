
<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
$query = 
"SELECT * 
FROM alumno
WHERE mail = 'luis@p.es'
UNION
SELECT * 
FROM profesor
WHERE mail = 'luis@p.es'
UNION
SELECT *
FROM tutorlegal
WHERE mail = 'luis@p.es';"
;
$result = $connection->query($query);
 if (!$result) die("Fatal Error");

var_dump($result);
foreach ($result as $row){
    $r=$row->fetch_array(MYSQLI_ASSOC);
    foreach ($r as $key=>$val){
        echo $key."-".$val."\n";
    }
}
 


?>