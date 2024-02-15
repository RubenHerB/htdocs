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
    $id=$p[$i]["IdPregunta"];
    $pre=$p[$i]["Pregunta"];
    $res=[$p[$i]["Respuesta1"],$p[$i]["Respuesta2"],$p[$i]["Respuesta3"],$p[$i]["Respuesta4"]];
    shuffle($res);
    echo <<<_END
    <div><fieldset id="pregunta$id"><legend>$pregunta</legend></fieldset><button onclick="comprobar($id)">Comprobar respuesta</button></div>

    _END;
}

?>