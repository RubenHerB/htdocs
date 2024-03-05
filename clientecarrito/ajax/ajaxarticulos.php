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
    <div class=\"col-md-4\">
        <img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"img/".$row['codArticulo'].".png\" alt=\"\" style=\"max-height:100px\">
    </div>
    <div class=\"col-md-8\">
    <h3>".$row['nombre']."</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
    <a class=\"btn btn-primary\" href=\"#\">View Project</a>
    </div>
  </div>

  <div class=\"modal fade\" id=\"imagemodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Image preview</h4>
      </div>
      <div class=\"modal-body\">
        <img src=\"\" id=\"imagepreview\" style=\"width: 400px; height: 264px;\" >
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>
  <hr>";
}
}

