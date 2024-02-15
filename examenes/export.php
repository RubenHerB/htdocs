<?php
$connection = new mysqli('localhost', "root", "", 'examen');    
if ($connection->connect_error) die("Fatal Error");
$query="SELECT * FROM preguntas";
$result = $connection->query($query);
$c=0;
foreach ($result as $r){
    $p[$c] = $r;
    $c++;
}
shuffle($p);
var_dump($p);
for($i=0;$i<10;$i++){
    $pe=$p[$i];
    echo <<<_END


    _END;
}

?>