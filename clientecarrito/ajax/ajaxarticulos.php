<?php
if (isset($_POST)){
    $filtro="";
    if (isset($_POST['pocos'])){
        if($_POST['pocos']==1){
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
    <div class=\"col-md-4\" id=\"pop\">
    <button type=\"button\" class=\"btn\" data-bs-toggle=\"modal\" data-bs-target=\"#modal".$row['codArticulo']."\">
        <img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/".$row['codArticulo'].".png\" alt=\"\" style=\"max-height:100px\">
        </button>
    </div>
    <div class=\"col-md-8\">
    <h3>".$row['nombre']."</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
    <a class=\"btn btn-primary\" href=\"#\">View Project</a>
    </div>
  </div>

<!-- Modal -->
<div class=\"modal fade\" id=\"modal".$row['codArticulo']."\" tabindex=\"-1\" aria-labelledby=\"modalLabel".$row['codArticulo']."\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">".$row['nombre']."</h1>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
      <img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/".$row['codArticulo'].".png\" alt=\"\" style=\"height:500px;width:auto\">
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<hr>";
}
}

