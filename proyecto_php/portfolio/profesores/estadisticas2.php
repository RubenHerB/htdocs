<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias CIFP Aviles</title>
    <link rel="stylesheet" href="../../css/dark-mode.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png">
    <style>
        li{padding: 2px 10px;
        }
    </style>
</head>
<?php
    session_start(); 
    if(!isset($_SESSION)){
        header("Location: ../index.php");
        
    }else{
        if($_SESSION["tipo"]!=0){
            header("Location: redirect.php");
        }else{
            if($_SESSION["rolnow"]!=2){
                header("Location: ../redirect.php");
            }
        }

    }
?>
<body id="bd" data-bs-theme="light">
    
<?php include "../dark.php"; ?>
<form action="../profesorprin.php">
<button type="submit" class="btn btn-primary">Panel de control</button>
</form>
<div class="container border border-secondary rounded align-middle" style="margin-top: 40px">
<h3 style="margin-top: 20px;">Estadisticas Tutoria</h3>
<h5><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']?></h5>

        <div class="d-flex justify-content-between"><div class="dropdown">
        <button class="btn btn-primary dropdown-toggle tipo" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g><g>
        <polygon points="0,0 0,128 201.143,329.143 201.143,512 310.857,475.429 310.857,329.143 512,128 512,0"/>
        </g></g></svg>
    
        </button>        
        <ul class="dropdown-menu">
        <li>
        <input class="form-check-input tipo" type="checkbox" value="leve" id="leve" checked>
        <label class="form-check-label" for="flexCheckDefault">
            Leves
        </label>
        </li>
        <li>
        <input class="form-check-input tipo" type="checkbox" value="media" id="media" checked>
        <label class="form-check-label" for="flexCheckDefault">
            Medias
        </label>
        </li>
        <li>
        <input class="form-check-input" type="checkbox" value="grave" id="grave" checked>
        <label class="form-check-label" for="flexCheckDefault">
            Graves
        </label>
        </li>
        <hr>
        <li>
        <input class="form-check-input" type="checkbox" value="historico" id="historico" >
        <label class="form-check-label" for="flexCheckDefault">
            Historico
        </label>
        </li>
        <hr>
        <li>
        <select class="form-select form-select-sm" id="tipo" aria-label="Small select example">
            <option value="asig" selected>Clase</option>
            <option value="type">Tipo</option>
        <select>
        </li>
        <hr>
        <li>
        <select class="form-select form-select-sm" id="orden" aria-label="Small select example">
            <option value="DESC" selected>↓</option>
            <option value="ASC">↑</option>
        <select>
        </li>
        <hr>
        <li>
        <button class="btn btn-primary type="button" onclick="ajaxtabla()">Filtrar</button>
        </li>
        </ul></div><form action="vista2.php"><button class="btn btn-primary type="submit">Incidencias</button></form></div>
<div class="table-responsive" id=tabla></div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src=../dark.js></script>
<script type="text/javascript">

function filtro(){
    var filtgravedad="";
    var filtasig="";
    var compasig=true;
    var leve=document.getElementById("leve").checked;
    var media=document.getElementById("media").checked;
    var grave=document.getElementById("grave").checked;
    if(!(leve && media && grave)){
        if(leve){
            filtgravedad="incibas.Tipo LIKE 'leve'";
        }
        if(media){
            if(leve){
                filtgravedad+=" or";
            }
            filtgravedad+= " incibas.Tipo LIKE 'media'";
        }
        if(grave){
        if(leve || media){
            filtgravedad+=" or";
        }
        filtgravedad+= " incibas.Tipo LIKE 'grave'";
        }
    }
    var historico=document.getElementById("historico").checked;
    if(!historico){
        if(filtgravedad!=""){
            filtgravedad+=" AND "
        }
        filtgravedad+= " alcl.Activa=1"
    }
    return filtgravedad;
}
var hr;
    function ajaxtabla(){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("tabla").innerHTML=this.responseText;
    }
};
pag="vistaestadisticas.php";
if(document.getElementById("tipo").value=="type"){
    pag="vistaestadisticas2.php";
}
hr.open("POST",pag);
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("filtro="+filtro()+"&orden="+document.getElementById("orden").value);
}


ajaxtabla();



</script>
</html>