<?php
var_dump($_POST);
if (isset($_POST)){
    $filtro="";
    if (isset($_POST['pocos'])){
        if($_POST['pocos']){
            $filtro=" WHERE cantidad<cantidadMinima";
        }else{
            $filtro=" WHERE NOT cantidad<cantidadMinima";
        }
    }
    $query="SELECT * FROM `articulos`".$filtro;
    $connection = new mysqli('localhost', 'root','', 'carritocliente');
    if ($connection->connect_error){
        die("Fatal Error");
    }
$result = $connection->query($query);
if (!$result){
    die("Fatal Error");
}
foreach($result as $row){
    echo "<div class=\"row\">
    <div class=\"col-md-7\">
        <img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/".$row['codArticulo'].".png\" alt=\"\">
    </div>
    <div class=\"col-md-5\">
    <h3>Project One</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
    <a class=\"btn btn-primary\" href=\"#\">View Project</a>
    </div>
  </div>";
}
}

