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
for($i=0;$i<10;$i++){
    $id=$p[$i]["IdPregunta"];
    $pre=$p[$i]["Pregunta"];
    $res=[$p[$i]["Respuesta1"],$p[$i]["Respuesta2"],$p[$i]["Respuesta3"],$p[$i]["Respuesta4"]];
    shuffle($res);
    echo <<<_END
    <div><fieldset id="pregunta$id"><legend>$pre</legend></fieldset><button onclick="comprobar($id)">Comprobar respuesta</button>
    _END;
    for($j=0;$j<4;$j++){
        $rr=$p[$j];
        echo <<<_END
        <input type="radio" name="res$id" id="$i-r-$j" value="$rr"><label for="$i-r-$j"></label><br>
        _END;
    }
    echo "</div>";

}

?>