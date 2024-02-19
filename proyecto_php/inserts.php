<?php
    include "portfolio/login.php";
    $connection = new mysqli('localhost', 'root','', 'incidencias');
    if ($connection->connect_error) die("Fatal Error");
    $c=1;
    for ($j=1; $j<=7;$j++) {
    for ($i=1; $i<=30; $i++) {
        $query ="INSERT INTO `alumno-clase` (IdAlumno,IdClase,Activa) VALUES (".$c.",".$j.",1)";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
        $c++;
    }}
    ?>