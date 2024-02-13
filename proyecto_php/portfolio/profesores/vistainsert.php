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
<form action="../profesorprin.php">
<button type="submit" class="btn btn-primary">Panel de control</button>
</form>
<div class="container border border-secondary rounded align-middle" style="margin-top: 40px">
<h3 style="margin-top: 20px;">Incidencias</h3>
<h5><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']?></h5>
<div class="d-flex justify-content-end"><form action="vista1.php"><button class="btn btn-primary type="submit">Ver incidencias</button></form></div>
<form>
<br>
<h6>Alumno</h6>
<div class="d-inline-flex justify-content-arround p-2">
<select class="form-select form-select-sm" name="clase" id="clase" aria-label="Small select example">
  <option selected>Clase</option>
    <?php
    $query="SELECT clas.Nombre as nombre ,clas.Tipo as tipo,clas.Year as year, clas.IdClase as id FROM clases as clas
    
    INNER JOIN asignaturas as asig
    ON clas.IdClase=asig.IdClase

    WHERE asig.IdProfesor=".$_SESSION['id']." GROUP BY clas.Nombre";
    
        include "../login.php";
        $con=(new login)->log($_SESSION['rolnow']);
        $result = $con->query($query);
        if (!$result) die("Fatal Error");
        foreach ($result as $row){
            echo "<option value=\"".$row['id']."\">".$row['nombre']." ".$row['tipo']." ".$row['year']."º</option>";
        }
    ?>
</select>




<div id="asig">
<select class="form-select form-select-sm" id="asigsel" aria-label="Small select example" >
  <option selected>Asignatura</option>
  <option value="1">Asignatura</option>
</select>
</div>

<div id="alum">
<select class="form-select form-select-sm" id="alumsel" aria-label="Small select example" disabled>
  <option selected>Alumno</option>
</select>
</div>

</div>
<br>
<h6>Fecha</h6>
<input
  type="datetime-local">
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src=../dark.js></script>
<script type="text/javascript">

function ajaxasig(idclase){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("asig").innerHTML=this.responseText;
    }
};
hr.open("POST","selects/selectasig.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("id="+idclase);
}




function ajaxalum(idasig){
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    hr = new XMLHttpRequest();
    hr.overrideMimeType('text/xml');
} else if (window.ActiveXObject) { // IE
    hr = new ActiveXObject("Microsoft.XMLHTTP");
}
hr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("alum").innerHTML=this.responseText;
    }
};
hr.open("POST","selects/selectasig.php");
hr.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
hr.send("id="+idasig);
}

document.getElementById("asigsel").addEventListener("change", function(){
    console.log("aa");
    console.log(document.getElementById("alum").value);
    if(document.getElementById("asigsel").value!="Asignatura"){
    ajaxalum(document.getElementById("asigsel").value);
}else{
        document.getElementById("alum").innerHTML="<select class=\"form-select form-select-sm\" id=\"alumsel\" aria-label=\"Small select example\" disabled><option selected>Alumno</option></select>";
    } 
});


document.querySelector("input[name=clase]").addEventListener("change", function(){
    console.log(document.getElementById("clase").value);
    if(document.getElementById("clase").value!="Clase"){
    ajaxasig(document.getElementById("clase").value);}else{
        document.getElementById("asig").innerHTML="<select class=\"form-select form-select-sm\" id=\"asigsel\" aria-label=\"Small select example\" disabled><option selected>Asignatura</option></select>";
        document.getElementById("alum").innerHTML="<select class=\"form-select form-select-sm\" id=\"alumsel\" aria-label=\"Small select example\" disabled><option selected>Alumno</option></select>";
    } 
});

</script>
</html>