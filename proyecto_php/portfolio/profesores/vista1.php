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
            if($_SESSION["rolnow"]!=1){
                header("Location: ../redirect.php");
            }
        }

    }
?>
<body id="bd" data-bs-theme="light">
    
<?php include "../dark.php"; ?>
<div class="container border border-secondary rounded align-middle" style="margin-top: 40px">
<h3 style="margin-top: 20px;">Incidencias</h3>
<h5><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']?></h5>
<?php 
include "../login.php";
$con=(new login)->log(1);
$query ="SELECT IdAsignatura,Nombre,Departamento FROM asignaturas WHERE IdProfesor LIKE '".$_SESSION['id']."'";
$result = $con->query($query);
if (!$result) die("Fatal Error");
$nr=$result->num_rows;
if($nr==0){
    echo <<<_END
    <div class="alert alert-secondary" role="alert" style="margin-top:16px">
    No existe ninguna asignatura en la que enseñe
    </div>
    _END;
}else{
    echo <<<_END
    <div class="dropdown">
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
            
    _END;
    for($i=0;$i<$nr;$i++){
        $result->data_seek($i);
        $r=$result->fetch_array(MYSQLI_ASSOC);
        $id=$r['IdAsignatura'];
        $nom=$r['Nombre'];
        $dep=$r['Departamento'];
        echo <<<_END
        <li><input class="form-check-input" type="checkbox" name="asignatura" value="$id" id="$id" checked>
        <label class="form-check-label" for="flexCheckDefault">
        $dep - $nom
        </label></li>
        _END;
    }
    echo <<<_END
        <hr>
        <li>
        <button class="btn btn-primary type="button" onclick="ajax()">Filtrar</button>
        </li>
        </ul></div>
        _END;

}
?>
<div id=tabla></div>
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
            filtgravedad="Tipo LIKE 'leve'";
        }
        if(media){
            if(leve){
                filtgravedad+=" or";
            }
            filtgravedad+= " Tipo LIKE 'media'";
        }
        if(grave){
        if(leve || media){
            filtgravedad+=" or";
        }
        filtgravedad+= " Tipo LIKE 'grave'";
        }
    }
    var inputs = document.getElementsByTagName("input");
    var inputva=[null];
    var c=0;
for(var i = 0; i < inputs.length; i++) {
    if(inputs[i].type == "checkbox") {
        if(inputs[i].checked == true){
        inputva[c]=inputs[i].value;
        c++;}else comp=false;
}}
    if(comp){
        filtasig="IdAsignatura LIKE'"+inputva[0]+"'"
        for (var j = 1; j < inputs.length; j++){
            filtasig=" OR IdAsignatura LIKE'"+inputva[i]+"'"
        }
    }

    var ret=filtgravedad;
    if(ret!="" && filtasig!=""){
        ret+=" AND ";
    }
    ret+= filtasig;

    return ret;
}
var hr;
    function ajax(){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
load();
}

    function load(){
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("tabla").innerHTML=this.responseText;
    }
};
hr.open("POST","vistatabla.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("filtro="+filtro());
}



</script>
</html>