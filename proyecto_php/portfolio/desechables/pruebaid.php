
<?php 
$connection = new mysqli('localhost', 'root', '', 'incidencias');
if ($connection->connect_error) die("Fatal Error");
$query = 
"SELECT * 
FROM alumno
WHERE Mail = 'luis@p.es'
UNION
SELECT * 
FROM profesor
WHERE Mail = 'luis@p.es'
UNION
SELECT *
FROM tutorlegal
WHERE Mail = 'luis@p.es';"
;
$result = $connection->query($query);
 if (!$result) die("Fatal Error");

var_dump($result);
    $row->data_seek(0);
    $r=$row->fetch_array(MYSQLI_ASSOC);
    foreach ($r as $key=>$val){
        echo $key."-".$val."\n";
    }

 


?>